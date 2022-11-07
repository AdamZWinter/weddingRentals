<?php

//Set, package, and choices are bitwise encoded into the $packageCode as follows:
// |------------------Choices--------------------||--Package--||----Set----|
//                 [remaining bits]                 [4 bits]    [4 bits] 
//
// 1 = Layered Arch, 2 = Modern Round, 3 = Vintage Mirror, 4 = Dark Walnut, 5 = Rustic Wood
// 16 = Full Set, 17 = Pick Six, 18 = Pick Four,  19 = platinum
// 256 and above will individual bit flags for the package choices


//Extras will be encoded into their own value  (values below are to be deprecated)
// 256 = Hex Arbor,  257 = Vintage Sofa,  258 = Gallon Jug,  259 = XL Win Jugs,  260 = Clear Jars,  261 = Blue Jars   (to be deprecated)
// 262 =  Delivery  (to be deprecated)


//reserve.php
require('header.php');
require('./models/Packages.php');
require('./models/Extras.php');

$redirect = '<script>
window.location.href="pickYourSet.php";
</script>';

$packageCode = 0;
  
  if( !isset($_GET['weddingDate']) ){
    echo $redirect;
  }else{
    $weddingDate = $_GET['weddingDate'];
    $dateArray = date_parse($weddingDate);
    $weddingMonth = $dateArray['month'];
  }

  if( !isset($_GET['packageCode']) ){
    echo $redirect;
  }else{
    $packageCode = $_GET['packageCode'];
    $thisPackage = Packages::getPackageByCode($packageCode);
  }

  if( !isset($_GET['cost']) ){
    echo $redirect;
  }else{
    $cost = $_GET['cost'];
  }

  // if( !isset($_GET['setOption']) ){
  //   echo $redirect;
  // }else{
  //   $setOption = $_GET['setOption'];
  // }

  // if( !isset($_GET['packageChoice']) ){
  //   echo $redirect;
  // }else{
  //   $packageChoice = $_GET['packageChoice'];
  // }

  // if(!isset($_GET['displaySets']) || $_GET['displaySets'] == 'false'){
  //   $displaySets = 'true';
  // }else{
  //   $displaySets = 'true';
  // }

  $hexarborLang ='';
  $vintagesofaLang ='';
  $antiquejugsLang ='';
  $winejugLang ='';
  $clearjarsLang ='';
  $bluejarsLang ='';
  $deliveryLang ='';

  $extras = [];

  // create list of prices to add
  $totalPrice = [$cost];

  $extrasObj = new Extras();

  if( !isset($_GET['hexarbor']) ){
    $hexarbor = false;
  }else{
    $hexarbor = true;
    $hexarborLang = 'Hexagonal Arbor';
    array_push($extras, 'Hexagonal Arbor');
    array_push($totalPrice, 350);
    $extrasObj->setOptionStatus(0, TRUE);
  }

  if( !isset($_GET['vintagesofa']) ){
    $vintagesofa = false;
  }else{
    $vintagesofa = true;
    $vintagesofaLang = 'Vintage Sofa';
    array_push($extras, 'Vintage Sofa');
    array_push($totalPrice, 99);
    $extrasObj->setOptionStatus(1, TRUE);
  }

  if( !isset($_GET['antiquejugs']) ){
    $antiquejugs = false;
  }else{
    $antiquejugs = true;
    $antiquejugsLang = 'Antique Jugs';
    array_push($extras, 'Antique Jugs');
    array_push($totalPrice, 4);
    $extrasObj->setOptionStatus(2, TRUE);
  }

  if( !isset($_GET['winejug']) ){
    $winejug = false;
  }else{
    $winejug = true;
    $winejugLang = 'Wine Jug';
    array_push($extras, 'Wine Jug');
    array_push($totalPrice, 20);
    $extrasObj->setOptionStatus(3, TRUE);
  }

  if( !isset($_GET['clearjars']) ){
    $clearjars = false;
  }else{
    $clearjars = true;
    $clearjarsLang = 'Clear Jars';
    array_push($extras, 'Clear Jars');
    array_push($totalPrice, 30);
    $extrasObj->setOptionStatus(4, TRUE);
  }

  if( !isset($_GET['bluejars']) ){
    $bluejars = false;
  }else{
    $bluejars = true;
    $bluejarsLang = 'Blue Jars';
    array_push($extras, 'Blue Jars');
    array_push($totalPrice, 30);
    $extrasObj->setOptionStatus(5, TRUE);
  }

  if( !isset($_GET['delivery']) ){
    $delivery = false;
  }else{
    $delivery = true;
    $deliveryLang = 'Delivery';
    array_push($extras,'Delivery');
    $extrasObj->setOptionStatus(6, TRUE);
  }
  //var_dump($_GET);

?>

<script>
  document.getElementById("headerImage").style.backgroundImage = "url('img/headerImages/signonTable.jpg')";
  document.getElementById("headerImage").style.backgroundPosition = "50% 67%";
  document.getElementById("headerImage").style.height = "300px";
</script>

    <div class = "container-fluid ">
      <div class = "row">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">
          <br>
          <br>
          <br>

            <div class="text-start">
                <?php
                    echo 'Set Selection: '.$thisPackage->getSetNameLang();
                    echo '<br>';
                    echo 'Wedding Date: '.$weddingDate;
                    echo '<br>';
                    echo 'Extras: ';
                    
                      foreach ($extrasObj->getSelectedExtrasArrayLang() as $extra){
                          echo '<br>';
                          echo '- ' .$extra ;

                      }

                    echo '<br>';
                    echo 'Estimated Total price: $' . array_sum($totalPrice);
                    
                ?>
            </div>

            <div class = "form-group text-start">
            <form name="extrasForm" id="extrasForm" action="vardump.php" method="get">
                <input type="hidden" id="weddingDate" name="weddingDate" value="<?php echo $weddingDate;?>">
                <input type="hidden" id="packageCode" name="packageCode" value="<?php echo $thisPackage->getCode();?>">
                <input type="hidden" id="extrasCode" name="extrasCode" value="<?php echo $extrasObj->getCode();?>">
                <!--input type="hidden" id="displaySets" name="displaySets" value="<?php //echo $displaySets;?>"-->
                <!--input type="hidden" id="setOption" name="setOption" value="<?php //echo $setOption;?>"-->
                <!--input type="hidden" id="packageChoice" name="packageChoice" value="<?php //echo $packageChoice;?>"-->
                <!--input type="hidden" id="hexarbor" name="hexarbor" value="<?php //echo $hexarbor;?>"-->
                <!--input type="hidden" id="antiquejugs" name="antiquejugs" value="<?php //echo $antiquejugs;?>"-->
                <!--input type="hidden" id="vintagesofa" name="vintagesofa" value="<?php //echo $vintagesofa;?>"-->
                <!--input type="hidden" id="winejug" name="winejug" value="<?php //echo $winejug;?>"-->
                <!--input type="hidden" id="clearjars" name="clearjars" value="<?php //echo $clearjars;?>"-->
                <!--input type="hidden" id="bluejars" name="bluejars" value="<?php //echo $bluejars;?>"-->
                <!--input type="hidden" id="delivery" name="delivery" value="<?php //echo $delivery;?>"-->

                <label for="fname" class="rental-head">First Name: </label>
                <input type="text" class= "form-control" id="fname" name="fname">
                <br>
                <label for="lname" class="rental-head">Last Name: </label>
                <input type="text" class= "form-control" id="lname" name="lname">
                <br>
                <label for="phone" class="rental-head">Phone: </label>
                <input type="text" class= "form-control" id="phone" name="phone">
                <br>
                <label for="email" class="rental-head">E-mail: </label>
                <input type="email" class= "form-control" id="email" name="email">
                <br>
                <br>
                <input class = "btn btn-primary button" type="submit" value="Continue">
            </form>
            </div>

        </div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-3 d-none d-md-block"></div>
      </div><!--end of row--> 

      </div><!--end of row--> 
    </div><!--End of container-fluid-->


<?php
//footer
require('footer.php');
?>