<?php

//vardump.php
require('header.php');

require('../weddingRentals.conf.php');
require('utilities/DatabaseConnector.php');

$myDB = new DatabaseConnector();
$db = $myDB->getdb();

$redirect = '<script>
window.location.href="pickYourSet.php";
</script>';
  
  if( !isset($_GET['fname']) ){
    echo $redirect;
  }else{
    $fname = $_GET['fname'];
  }
 
  if( !isset($_GET['lname']) ){
    echo $redirect;
  }else{
    $lname = $_GET['lname'];
  }

  if( !isset($_GET['phone']) ){
    echo $redirect;
  }else{
    $phone = $_GET['phone'];
  }

  if( !isset($_GET['email']) ){
    echo $redirect;
  }else{
    $email = $_GET['email'];
  }

  if( !isset($_GET['setOption']) ){
    echo $redirect;
  }else{
    $setOption = $_GET['setOption'];

    switch ($setOption){
      case 'layeredarch':
          $setOptionLang = 'Layered Arch';
          break;
      case 'modernround':
          $setOptionLang = 'Modern Round';
          break;
      case 'vintagemirror':
          $setOptionLang = 'Vintage Mirror';
          break;
      case 'darkwalnut':
          $setOptionLang = 'Dark Walnut';
          break;
      case 'rusticwood':
          $setOptionLang = 'Rustic Wood';
          break;
    }//end switch
  }

  

  //package
  if( !isset($_GET['packageChoice']) ){
    echo $redirect;
  }else{
    $packageChoice = $_GET['packageChoice'];

    switch($packageChoice){
      case 'fullSet':
        $packageChoiceLang = 'Full Set';
        break;
    case 'pickSix':
        $packageChoiceLang = 'Pick Six';
        break;
    case 'pick4':
        $packageChoiceLang = 'Pick 4';
        break;
    case 'platinum':
        $packageChoiceLang = 'Platinum';
        break;
    }//end switch
  }

  if( !isset($_GET['packageCode']) ){
    echo $redirect;
  }else{
    $packageCode = $_GET['packageCode'];
  }


  if( !isset($_GET['weddingDate']) ){
    echo $redirect;
  }else{
    $weddingDate = $_GET['weddingDate'];
    $dateArray = date_parse($weddingDate);
    $weddingMonth = $dateArray['month'];
  }



  //extras

  $extras = [];
  $hexarborLang ='';
  $vintagesofaLang ='';
  $antiquejugsLang ='';
  $winejugLang ='';
  $clearjarsLang ='';
  $bluejarsLang ='';
  $deliveryLang ='';

  

  // if(($packageCode & 256) != 0){
  //   array_push($extras, 'Hexagonal Arbor');
  // }

  // if(($packageCode & 257) != 0){
  //   array_push($extras, 'Vintage Sofa');
  // }

  // if($packageCode & 258){
  //   array_push($extras, 'Antique Jugs');
  // }

  // if($packageCode & 259){
  //   array_push($extras, 'Wine Jug');
  // }

  // if($packageCode & 260){
  //   array_push($extras, 'Clear Jars');
  // }

  // if($packageCode & 261){
  //   array_push($extras, 'Blue Jars');
  // }

  // if($packageCode & 262){
  //   array_push($extras,'Delivery');
  // }



  if( !isset($_GET['hexarbor']) || $_GET['hexarbor'] == '' ){
    //nothing
  }else{
    $hexarbor = true;
    $hexarborLang = 'Hexagonal Arbor';
    array_push($extras, 'Hexagonal Arbor');
  }

  if( !isset($_GET['vintagesofa']) || $_GET['vintagesofa'] == ''){
    //nothing
  }else{
    $vintagesofa = true;
    $vintagesofaLang = 'Vintage Sofa';
    array_push($extras, 'Vintage Sofa');
  }

  if( !isset($_GET['antiquejugs']) || $_GET['antiquejugs'] == ''){
    //nothing
  }else{
    $antiquejugs = true;
    $antiquejugsLang = 'Antique Jugs';
    array_push($extras, 'Antique Jugs');
  }

  if( !isset($_GET['winejug']) || $_GET['winejug'] == '' ){
    //nothing
  }else{
    $winejug = true;
    $winejugLang = 'Wine Jug';
    array_push($extras, 'Wine Jug');
  }

  if( !isset($_GET['clearjars']) || $_GET['clearjars'] == '' ){
    //nothing
  }else{  
    $clearjars = true;
    $clearjarsLang = 'Clear Jars';
    array_push($extras, 'Clear Jars');
  }

  if( !isset($_GET['bluejars']) || $_GET['bluejars'] == ''){
    //nothing
  }else{
    $bluejars = true;
    $bluejarsLang = 'Blue Jars';
    array_push($extras, 'Blue Jars');
  }

  if( !isset($_GET['delivery']) || $_GET['delivery'] == ''){
    //nothing
  }else{
    $delivery = true;
    $deliveryLang = 'Delivery';
    array_push($extras,'Delivery');
  }




?>

<h1 class="text-center">Thank you for choosing Walnut Ridge</h1>
<p class="text-center">The Walnut Ridge Wedding Rental Team will be confirming your order soon</p>
<p class="text-center">A copy of the information below will be emailed to you</p><br><br>


    <div class="row justify-content-center">
        <div class="col-2">
        <h3>First Name: </h3>
        <span class="text-color"><?php echo $_GET['fname'] ?></span>
        </div>
        <div class="col-2">
        <h3>Last Name: </h3>
        <p><?php echo $_GET['lname'] ?></p>
      </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-2">
        <h3>Email: </h3>
        <span class="text-color"><?php echo $_GET['email'] ?></span>
        </div>
        <div class="col-2">
        <h3>Phone Number: </h3>
        <p><?php echo $_GET['phone'] ?></p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-2">
        <h3>Set Option: </h3>
        <span class="text-color"><?php echo $setOptionLang ?></span>
        </div>
        <div class="col-2">
        <h3>Package: </h3>
        <p><?php echo $packageChoiceLang ?></p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-2">
        <h3>Wedding Date: </h3>
        <span class="text-color"><?php echo $_GET['weddingDate'] ?></span>
        </div>
        <div class="col-2">
            <h3>Extras:</h3> 
            <p>
            <?php foreach ($extras as $extra){
                            echo '- ' .$extra ;
                            echo '<br>';
                    } 
            ?>
            </p>
        </div>
    </div>


  
<?php
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