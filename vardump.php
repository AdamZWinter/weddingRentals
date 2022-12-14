<?php
//saving all contact information
//   if(!empty($_POST)){
//     setcookie('fname', $_POST['fname'], time()+3600);
//      setcookie('lname', $_POST['lname'], time()+3600);
//     setcookie('phone', $_POST['phone'], time()+3600);
//     setcookie('email', $_POST['email'], time()+3600);

//     $cookieRedirect = '<script>
//     window.location.href="vardump.php";
//     </script>';

//     echo $cookieRedirect;

//   }else{
//     echo "<p>first name is: </p>".$_COOKIE['fname'];
//   }
//vardump.php
require('header.php');

require('../weddingRentals.conf.php');
require('utilities/DatabaseConnector.php');
require('./models/Packages.php');
require('./models/Extras.php');

$myDB = new DatabaseConnector();
$db = $myDB->getdb();

$redirect = '<script>
window.location.href="pickYourSet.php";
</script>';

if( !isset($_POST['weddingDate']) ){
  echo $redirect;
}else{
  $weddingDate = $_POST['weddingDate'];
  $dateArray = date_parse($weddingDate);
  $weddingMonth = $dateArray['month'];
  $unixTime = mktime(0, 0, 0, $dateArray['month'], $dateArray['day'], $dateArray['year']);
}

if( !isset($_POST['packageCode']) ){
  echo $redirect;
}else if(ctype_digit($_POST['packageCode'])){
  $packageCode = $_POST['packageCode'];
  $thisPackage = Packages::getPackageByCode($packageCode);
}else{
  echo "GTFO";
  exit;
}

if( !isset($_POST['extrasCode']) ){
  echo $redirect;
}else if(ctype_digit($_POST['extrasCode'])){
  $extrasCode = $_POST['extrasCode'];
  $thisExtras = new Extras();
  $thisExtras->decode($extrasCode);
}else{
  echo "GTFO";
  exit;
}

  
  if( !isset($_POST['fname']) ){
    echo $redirect;
  }else if(ctype_alpha($_POST['fname'])){
    //$fname = $_POST['fname'];
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }else{
    echo "First name format is incorrect. ";
    exit;
  }
 
  if( !isset($_POST['lname']) ){
    echo $redirect;
  }else{
    $lname = $_POST['lname'];
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if( !isset($_POST['phone']) ){
    echo $redirect;
  }else{
    $phone = $_POST['phone'];
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if( !isset($_POST['email']) ){
    echo $redirect;
  }else{
    $email = $_POST['email'];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $validEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  }


  // alternate info
  if( !isset($_POST['altFirstName']) ){
    echo $redirect;
  }else if(ctype_alpha($_POST['altFirstName'])){
    //$altFirstName = $_POST['altFirstName'];
    $altFirstName = filter_input(INPUT_POST, 'altFirstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  
  //else{
  //  echo "First name format is incorrect. ";
   // exit;
  //}
 
  if( !isset($_POST['altLastName']) ){
    //echo $redirect;
  }else{
    $altLastName = $_POST['altLastName'];
    $altLastName = filter_input(INPUT_POST, 'altLastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if( !isset($_POST['altPhone']) ){
    //echo $redirect;
  }else{
    $altPhone = $_POST['altPhone'];
    $altPhone = filter_input(INPUT_POST, 'altPhone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if( !isset($_POST['altEmail']) ){
    //echo $redirect;
  }else{
    $altEmail = $_POST['altEmail'];
    $altEmail = filter_input(INPUT_POST, 'altEmail', FILTER_SANITIZE_EMAIL);
    $altEmail = filter_input(INPUT_POST, 'altEmail', FILTER_VALIDATE_EMAIL);
  }


  if(!$validEmail){
    echo 'Sorry, there seems to be some trouble with the email address you provided.';
    exit;
  }

//****************************************Insert to Database *****************************************************/

$reservationID = $weddingDate.'_'.$packageCode.'_'.$extrasCode.'_'.$lname;

$query = "SELECT `email` FROM `customers` WHERE `email` = '". $email ."'";
$result = $db->query($query);
if($result->num_rows == 0){
  //$query = "INSERT INTO `customers`(`email`, `fname`, `lname`, `phone`) VALUES ('".$email."','".$fname."','".$lname."','".$phone."')";
  //$db->query($query);
  $stmt = $db->prepare("INSERT INTO `customers`(`email`, `fname`, `lname`, `phone`, `altEmail`, `altFirstName`, `altLastName`, `altPhone`) VALUES (?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssss", $email, $fname, $lname, $phone, $altEmail, $altFirstName, $altLastName, $altPhone);
  $stmt->execute();
  $result = $stmt->get_result();
}else{
  //customer already exists
}

$query = "INSERT INTO `extras`(`reservationID`, `extrasJSON`, `extrasCode`, `hexArborQty`, `vintageSofaQty`, `antiqueGallonQty`, `wineJugsQty`, `clearBallJarsQty`, `blueBallJarsQty`, `deliveryQty`) 
          VALUES ('". $reservationID ."',
                  '". json_encode($thisExtras->getSelectedExtrasArrayLang()) ."',
                  '". $thisExtras->getCode() ."',
                  '". $thisExtras->getOptionQty(0) ."',
                  '". $thisExtras->getOptionQty(1) ."',
                  '". $thisExtras->getOptionQty(2) ."',
                  '". $thisExtras->getOptionQty(3) ."',
                  '". $thisExtras->getOptionQty(4) ."',
                  '". $thisExtras->getOptionQty(5) ."',
                  '". $thisExtras->getOptionQty(6) ."'
                  )";
$db->query($query);

$query = "INSERT INTO `reservations`(`reservationID`, `customerID`, `dateUnix`, `dateHuman`, `signSet`, `signSetLang`, `package`, `packageCode`, `packageJSON`, `status`) 
          VALUES ('". $reservationID ."',
                  '". $email ."',
                  '". $unixTime ."',
                  '". $weddingDate ."',
                  '". $thisPackage->getSetName() ."',
                  '". $thisPackage->getSetNameLang() ."',
                  '". $thisPackage->getSubsetTypeLang() ."',
                  '". $thisPackage->getCode() ."',
                  '". json_encode($thisPackage->getChoicesArray()) ."',
                  'new'
                  )";
$db->query($query);


?>

<ul class = "relative">
      <li class="text-style">Sets</li>
      <li class="text-style">Packages</li>
      <li class="text-style">Extras</li>
      <li class="text-style">Reservation</li>
      <li class="page-select">Confirmation</li>
  </div>

<h1 class="text-center">Thank you for choosing Walnut Ridge, <?php echo $fname?></h1><br>
<p class="text-center">The Walnut Ridge Wedding Rental Team will be confirming your order soon</p>
<p class="text-center">A copy of the information below will be emailed to you</p><br><br>


    <div class="row justify-content-center">
        <div class="col-2">
        <h3>First Name: </h3>
        <span class="text-color"><?php echo $_POST['fname'] ?></span>
        </div>
        <div class="col-2">
        <h3>Last Name: </h3>
        <p><?php echo $_POST['lname'] ?></p>
      </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-2">
        <h3>Email: </h3>
        <span class="text-color"><?php echo $_POST['email'] ?></span>
        </div>
        <div class="col-2">
        <h3>Phone Number: </h3>
        <p><?php echo $_POST['phone'] ?></p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-2">
        <h3>Set Option: </h3>
        <span class="text-color"><?php echo $thisPackage->getSetNameLang(); ?></span>
        </div>
        <div class="col-2">
        <h3>Package: </h3>
        <p><?php echo $thisPackage->getSubsetTypeLang(); ?></p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-2">
        <h3>Wedding Date: </h3>
        <span class="text-color"><?php echo $_POST['weddingDate'] ?></span>
        </div>
        <div class="col-2">
            <h3>Extras:</h3> 
            <p>
            <?php foreach ($thisExtras->getSelectedExtrasArrayLang() as $extra){
                            echo '- ' .$extra ;
                            echo '<br>';
                    } 
            ?>
            </p>
        </div>
    </div>


  
<?php
$setOption = $thisPackage->getSetName();
$setOptionLang = $thisPackage->getSetNameLang();
$packageChoice = $thisPackage->getSubsetType();
$packageChoiceLang = $thisPackage->getSubsetTypeLang();

//Sending the email
  //recipient
  //$to = "britanytorres888@gmail.com";

  //subject
  //$subject = "Walnut Ridge Wedding Rental Reservation Confirmation";

  //message
  //$message ="
  //<html>
  //<head>
    //<title>Walnut Ridge Wedding Rental Reservation Confirmation</title>
  //</head>
  //<body>
  //<h1>Thank you for choosing Walnut Ridge</h1>
  //<p>The Walnut Ridge Wedding Rental Team will be confirming your order soon</p>
  //<p>A copy of the information below will be emailed to you</p><br><br>

  //<h3>First name: </h3>
  //<p>".echo $fname."</p>
  //<h3>Last name: </h3>
  //<p>".echo $lname."</p>
  //<h3>Email: </h3>
  //<p>".echo $email."</p>
  //<h3>Phone Number: </h3>
  //<p>".echo $phone."</p>
  //<h3>Set Option: </h3>
  //<p>".echo $setOptionLang."</p>
  //<h3>Package: </h3>
  //<p>".echo $packageChoiceLang."</p>
  //<h3>Wedding Date: </h3>
  //<p>".echo $weddingDate."</p>
  //<h3>Extras: </h3>
  //<p>". foreach ($extras as $extra){
    //echo '- ' .$extra ;
    //echo '<br>';
    //} 
    //."</p>

  //</body>
  //</html
  //";

  //$message = wordwrap($message, 70);

  //headers
  //$headers = "From: Walnut Ridge Wedding Rentals <walnutridge@wedding.com>" . "\r\n" .
  //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  //send email
  //mail($to, $subject, $message, $headers);
?>


<?php
//footer
require('footer.php');
?>