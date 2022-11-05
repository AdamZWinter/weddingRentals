
<?php

//extras.php
require('header.php');
require('./models/Packages.php');

$thisPackage;

$redirect = '<script>
window.location.href="pickYourSet.php";
</script>';
  
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
    $thisPackage->setOption01(TRUE);                            //***************For testing only   REMOVE THESE */
    $thisPackage->setOption04(TRUE);                            //***************For testing only   REMOVE THESE */
    $thisPackage->setOption10(TRUE);                            //***************For testing only   REMOVE THESE */
  }

  if( !isset($_GET['setOption']) ){
    echo $redirect;
  }else{
    $setOption = $_GET['setOption'];
  }

  if( !isset($_GET['packageChoice']) ){
    echo $redirect;
  }else{
    $packageChoice = $_GET['packageChoice'];
  }  

  if(!isset($_GET['displaySets']) || $_GET['displaySets'] == 'false'){
    $displaySets = 'true';
  }else{
    $displaySets = 'true';
  }





  $hexarchAvailable = $weddingMonth == 1 ? 'disabled' : '';
  $couchAvailable = $weddingMonth == 2 ? 'disabled' : '';
  $antiquejugsAvailable = $weddingMonth == 3 ? 'disabled': '';
  $winejugsAvailable = $weddingMonth == 3 ? 'disabled': '';
  $clearjarsAvailable = $weddingMonth == 4 ? 'disabled': '';
  $bluejarsAvailable = $weddingMonth == 4 ? 'disabled': '';
  $deliveryAvailable = $weddingMonth == 5 ? 'disabled' : '';

  $extrasWarning = ($hexarchAvailable || $couchAvailable || $antiquejugsAvailable || $clearjarsAvailable || $deliveryAvailable) ? 'd-block' : 'd-none';
  //$extrasWarning = "d-block";

   //adding cost variable based on set choice 
  //TODO : UPDATE packageChoice names on package.php!!!!
  $priceArray = [849, 799, 749, 699, 649, 599, 299, 249, 199];


  $cost = 0;
  if($setOption == 'layeredarch'){
    if($packageChoice == 'fullset'){
        $cost = $priceArray[0];
    }
    if($packageChoice == 'pick6'){
        $cost = $priceArray[2];
    }
    if($packageChoice == 'pick4'){
        $cost = $priceArray[3];
    }    
  }
  if($setOption == 'modernround'){
    if($packageChoice == 'fullset'){
        $cost = $priceArray[1];
    }
    if($packageChoice == 'pick6'){
        $cost = $priceArray[3];
    }
    if($packageChoice == 'pick4'){
        $cost = $priceArray[5];
    }    
  }
  if($setOption == 'vintagemirror'){
    if($packageChoice == 'platinum'){
        $cost = $priceArray[0];
    }
    if($packageChoice == 'gold'){
        $cost = $priceArray[1];
    }
    if($packageChoice == 'vmpick6'){
        $cost = $priceArray[4];
    }    
    if($packageChoice == 'vmpick4'){
        $cost = $priceArray[5];
    }  
  }
  if($setOption == 'darkwalnut' && $packageChoice == 'pick4'){
    $cost = $priceArray[8];
  }
  if($setOption == 'darkwalnut' && $packageChoice == 'pick6'){
    $cost = $priceArray[7];
  }
  if($setOption == 'darkwalnut' && $packageChoice == 'fullset'){
    $cost = $priceArray[6];
  }
  if($setOption == 'rusticwood' && $packageChoice == 'pick4'){
    $cost = $priceArray[8];
  }
  if($setOption == 'rusticwood' && $packageChoice == 'pick6'){
    $cost = $priceArray[7];
  }
  if($setOption == 'rusticwood' && $packageChoice == 'fullset'){
    $cost = $priceArray[6];
  }
    

  if($setOption == 'darkwalnut'){
    $setName = "Dark Walnut";
  }
  if($setOption == 'rusticwood'){
    $setName = "Rustic Wood";
  }
  if($setOption == 'layeredarch'){
    $setName = "Layered Arch";
  }
  if($setOption == 'modernround'){
    $setName = "Modern Round";
  }
  if($setOption == 'vintagemirror'){
    $setName = "Vintage Mirror";
  }
  
  //reusable text
  $VMPlatinumSub = "INCLUDES ALL OF THE FOLLOWING 11 ITEMS";
  $VMGoldSub = "INCLUDES ALL THE FOLLOWING 8 ITEMS";
  $fullsetSub = "INCLUDES ALL OF THE FOLLOWING ITEMS";
  $pick6Sub = "YOUR 6 SET ITEMS";
  $pick4Sub = "YOUR 4 SET ITEMS";

  $pick6Title = "PICK 6 Rental";
  $pick4Title = "PICK 4 Rental";
  $fullSetTitle= "Full Set Rental";
  $fullpackageTitle = "Full Package Rental";
  $noSeatingTitle = '“No Seating” Rental';
  $VMPlatinumTitle= "Platinum Package Rental";
  $VMGoldTitle= "Gold Package Rental";
  //TODO : HTML mark-up for upsell package AND logic to decide which to show below
  $titleName = '';
  $subtitle = '';
  if($setOption == 'layeredarch' || $setOption == 'modernround'){
    if($packageChoice == 'fullset'){
      $titleName = "{$setName} {$fullSetTitle} $".$cost;
      $subtitle = $fullsetSub;
    }
  }
  if($setOption == 'layeredarch' || $setOption == 'modernround'){
    if($packageChoice == 'pick6'){
      $titleName = "{$setName} {$pick6Title} $".$cost;
      $subtitle = $pick6Sub;
    }
  }
  if($setOption == 'layeredarch' || $setOption == 'modernround'){
    if($packageChoice == 'pick4'){
      $titleName = "{$setName} {$pick4Title} $".$cost;
      $subtitle = $pick4Sub;
    }
  }
   
  if($setOption == 'rusticwood' || $setOption == 'darkwalnut'){
    if($packageChoice == 'fullset'){
      $titleName = "{$setName} {$fullpackageTitle} $".$cost;
    }
  }
  if($setOption == 'rusticwood' || $setOption == 'darkwalnut'){
    if($packageChoice == 'pick6'){
      $titleName = "{$setName} {$noSeatingTitle} $".$cost;
      }
  }
  if($setOption == 'rusticwood' || $setOption == 'darkwalnut'){
    if($packageChoice == 'pick4'){
      $titleName = "{$setName} {$pick4Title} $".$cost;
    }
  }
  
  if($setOption == 'vintagemirror'){
    if($packageChoice == 'platinum'){
      $titleName = "{$setName} {$VMPlatinumTitle} $".$cost;
      $subtitle = $VMPlatinumSub;
    }
    if($packageChoice == 'gold'){
      $titleName = "{$setName} {$VMGoldTitle} $".$cost;
      $subtitle = $VMGoldSub;
    }
    if($packageChoice == 'vmpick6'){
      $titleName = "{$setName} {$pick6Title} $".$cost;
      $subtitle = $pick6Sub;
    }
    if($packageChoice == 'vmpick4'){
      $titleName = "{$setName} {$pick4Title} $".$cost;
      $subtitle = $pick4Sub;
    }
  }

//TODO update $packageList to only include items selected on packages page.  
    $packageList = '
    <ul class = "descriptionList"> 
                    <li>Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)</li>
                    <li>3 piece seating chart half arch set (print service for cards is available for a small additional fee)</li>
                    <li>Table numbers 1-30</li>
                    <li>Gold Card Terrarium with choice of “Gifts & Cards” sign</li>
                    <li>5 “Reserved” signs</li>
                    <li>Up to 2 Double Half Arch Small signs (“Gifts & Cards,” “Take One,” “Dont Mind if I Do,” “In Loving Memory”)</li>
                    <li>Up to 2 Sunset Small signs (“Please Sign Our Guestbook,” “Gifts & Cards,” “In Loving Memory”)</li>
                    <li>1 Double Half Arch Medium sign (“Cheers,” “The Bar,” “Guestbook,” or Custom Acrylic Text)</li>
                    <li>1 Double Full Arch Medium sign (“Signature Drinks,” or Custom Acrylic Text) </li>
                    <li>Unplugged Ceremony sign</li>
                    <li>Hairpin Record Player Prop</li>
                    <li>"Mr & Mrs" Custom Head Table Keepsake is a free gift in addition to the items above</li>
                    </ul>
    ';
  

  // UPSELL package code below  
  if($packageChoice == "pick4"){
    $upgradeOptions = ['fullset' , 'pick6'];
  };
  if($packageChoice == "pick6"){
    $upgradeOptions = ['fullset'];
  };
  if($packageChoice == "vmpick4"){
    $upgradeOptions = ['platinum', 'gold' , 'vmpick6'];
  };
  if($packageChoice == "vmpick6"){
    $upgradeOptions = ['platinum', 'gold'];
  };
  if($packageChoice == "gold"){
    $upgradeOptions = ['platinum'];
  };
  
  $upgradeMarkup = '';
  if(!empty($upgradeOptions)){
    foreach($upgradeOptions as $value){
      //FULL SET UPGRADE
      if($value == 'fullset'){
        $packageUp = $fullSetTitle;
        if($setOption == 'layeredarch'){
          $priceDiff = $priceArray[0] - $cost;
        }
        if($setOption == 'modernround'){
          $priceDiff = $priceArray[1] - $cost;
        }
        if($setOption == 'rusticwood' || $setOption == 'darkwalnut'){
          $priceDiff = $priceArray[6] - $cost;
        }
      }
      //PICK 6 UPGRADE
      if($value == 'pick6' || $value == 'vmpick6' ){
        $packageUp = $pick6Title;
        if($setOption == 'layeredarch'){
          $priceDiff = $priceArray[2] - $cost;
        }
        if($setOption == 'modernround'){
          $priceDiff = $priceArray[3] - $cost;
        }
        if($setOption == 'rusticwood' || $setOption == 'darkwalnut'){
          $priceDiff = $priceArray[7] - $cost;
        }
        if($setOption == 'vintagemirror'){
          $priceDiff = $priceArray[4] - $cost;
        }
      }
      //PLATINUM UPGRADE
      if($value == 'platinum'){
        $packageUp = $VMPlatinumTitle;
        $priceDiff = $priceArray[0] - $cost;
      }
      //GOLD UPGRADE
      if($value == 'gold'){
        $packageUp = $VMGoldTitle;
        $priceDiff  = $priceArray[1] - $cost;
      }
            $upgradeMarkup .= '
               <form name="upgradeForm" id="upgradeForm" action="packages.php" method="get">
                  <input type="hidden" id="weddingDate" name="weddingDate" value="'.$weddingDate.'">
                  <input type="hidden" id="displaySets" name="displaySets" value="'.$displaySets.'">
                  <input type="hidden" id="setOption" name="setOption" value="'.$setOption.'">
                  <input type="hidden" id="upsellPackage" name="upsellPackage" value="'.$value.'">                
                  <input type="submit" value="Upgrade to '.$packageUp.' for $'.$priceDiff.'">
              </form>              
  ';
  }
}


?>



<div class = "container-fluid">
  <h3>Your Package:</h3>
  <div class = "row">
    <div class = "col-sm-3"></div>
    <div class = "col-sm-6 topper">
     <h5 class = "rental-head"> <?php echo $titleName;?> </h5>
     <h6 > <?php echo $subtitle;?> </h6>
     <?php echo $packageList;?>   
    
       
    
    <div>
    <div class = "col-sm-3"></div>
  </div>

</div>

<div class = "container-fluid">
  <div class = "row">
    <div class = "col-sm-3"></div>

    <div class = "col-sm-6 topper">
      <?php echo $upgradeMarkup;?>       
    </div>

    <div class = "col-sm-3"></div>
  </div>
</div>


    <div class = "container-fluid ">
      <div class = "row">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">

            <div class = "form-group text-start">
            <form name="extrasForm" id="extrasForm" action="reserve.php" method="get">
                <input type="hidden" id="packageCode" name="packageCode" value="<?php echo $thisPackage->getCode();?>">
                <input type="hidden" id="weddingDate" name="weddingDate" value="<?php echo $weddingDate;?>">
                <input type="hidden" id="displaySets" name="displaySets" value="<?php echo $displaySets;?>">
                <input type="hidden" id="setOption" name="setOption" value="<?php echo $setOption;?>">
                <input type="hidden" id="packageChoice" name="packageChoice" value="<?php echo $packageChoice;?>">

                <br>
                <br>


                <label for="extras" class="rental-head">Choose Your Extras:</label>
                <br>
                <br>
                <p class="<?php echo $extrasWarning;?>">(Some of these are not available on <?php echo $weddingDate;?>)</p>
                <input  type="checkbox" id="hexarbor" name="hexarbor" <?php echo $hexarchAvailable;?>>
                <label for="hexarbor" class = "option-style">  Hexagon Arbor</label>
                <br>
                <input type="checkbox" id="vintagesofa" name="vintagesofa" <?php echo $couchAvailable;?>>
                <label for="vintagesofa" class = "option-style"> Vintage Sofa</label>
                <br>
                <input type="checkbox" id="antiquejugs" name="antiquejugs" <?php echo $antiquejugsAvailable;?>>
                <label for="antiquejugs" class = "option-style"> Antique Gallon Jugs</label>   
                <br>
                <input type="checkbox" id="winejug" name="winejug" <?php echo $winejugsAvailable;?>>
                <label for="winejug" class = "option-style"> XL Wine Jugs</label>
                <br>
                <input type="checkbox" id="clearjars" name="clearjars" <?php echo $clearjarsAvailable;?>>
                <label for="clearjars" class = "option-style"> Clear Antique Ball Jars</label>
                <br>
                <input type="checkbox" id="bluejars" name="bluejars" <?php echo $bluejarsAvailable;?>>
                <label for="bluejars" class = "option-style"> Blue Antique Ball Jars</label>
                <br>
                <br>
                <input type="checkbox" id="delivery" name="delivery" <?php echo $deliveryAvailable;?>>
                <label for="delivery" class="upper">Delivery</label><a href="delivery.html">?</a>
                <br>
                <br>
                <input type="submit" value="Continue">
            </form>
            </div>
            
        </div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-3 d-none d-md-block"></div>
      </div><!--end of row--> 

      </div><!--end of row--> 
    </div><!--End of container-fluid-->
    

<br>
<br>


<script>
  document.getElementById("headerImage").style.backgroundImage = "url('img/headerImages/signonTable.jpg')";
  document.getElementById("headerImage").style.backgroundPosition = "50% 67%";
  document.getElementById("headerImage").style.height = "300px";


  function checkAllExtrasBoxes() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = true;
    }
  }

  
  function checkFourBoxes(){
  console.log("checkFourBoxes() is triggered ");
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var checkbox of checkboxes) {
      checkbox.checked = true;
  }
}
</script>

<?php
if( !isset($_GET['packageChoice']) ){
  //echo $redirect;
}else{
  $packageChoice = $_GET['packageChoice'];
  if( $packageChoice == 'fullSet'){
    //echo("<script>console.log('packageChoice = fullSet');</script>");

    echo '<script type="text/javascript">',
     'checkAllExtrasBoxes();',
     '</script>';
  }
  if( $packageChoice == 'pickSix'){
    //echo("<script>console.log('packageChoice = pickSix');</script>");

  }
  if( $packageChoice == 'pick4'){
    //echo("<script>console.log('packageChoice = pick4');</script>");
    echo '<script type="text/javascript">',
     'checkFourBoxes();',
     '</script>';;
  }
 

}
?>

<?php
//footer
require('footer.php');
?>