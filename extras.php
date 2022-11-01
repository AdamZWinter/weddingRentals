<?php

//extras.php
require('header.php');

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

  if( !isset($_GET['setOption']) ){
    echo $redirect;
  }else{
    $setOption = $_GET['setOption'];
  }

  if( !isset($_GET['packageChoice']) ){
    //echo $redirect;
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
  if($setOption == 'layeredarch'){
    if($packageChoice == 'fullset'){
        $cost = 849;
    }
    if($packageChoice == 'pick6'){
        $cost = 749;
    }
    if($packageChoice == 'pick4'){
        $cost = 699;
    }    
  }
  if($setOption == 'modernround'){
    if($packageChoice == 'fullset'){
        $cost = 799;
    }
    if($packageChoice == 'pick6'){
        $cost = 699;
    }
    if($packageChoice == 'pick4'){
        $cost = 599;
    }    
  }
  if($setOption == 'vintagemirror'){
    if($packageChoice == 'vmplatinum'){
        $cost = 849;
    }
    if($packageChoice == 'vmgold'){
        $cost = 799;
    }
    if($packageChoice == 'vmpick6'){
        $cost = 649;
    }    
    if($packageChoice == 'vmpick4'){
        $cost = 599;
    }  
  }
  if($setOption == 'darkwalnut' || $setOption == 'rusticwood'){
    if($packageChoice == 'fullpackage'){
        $cost = 299;
    }
    if($packageChoice == 'noseating'){
        $cost = 245;
    }
    if($packageChoice == 'drpick4'){
        $cost = 199;
    }    
  }
  //reusable text
  $VMPlatinumSub = "INCLUDES ALL OF THE FOLLOWING 11 ITEMS";
  $VMGoldSub = "INCLUDES ALL THE FOLLOWING 8 ITEMS";
  $fullsetSub = "INCLUDES ALL OF THE FOLLOWING ITEMS";
  $pick6Sub = "CHOOSE 6 OF THE FOLLOWING ITEMS";
  $pick4Sub = "CHOOSE 4 OF THE FOLLOWING ITEMS";

  $pick6Title = "PICK 6 Rental";
  $pick4Title = "PICK 4 Rental";
  $fullSetTitle= "Full Set Rental";
  $VMPlatinumTitle= "Vintage Mirror Platinum Package Rental";
  $VMGoldTitle= "Vintage Mirror Gold Package Rental";
  //TODO : HTML mark-up for upsell package AND logic to decide which to show below
  if($setOption == 'layeredarch'){
    if($packageChoice == 'fullset'){
      $titleName = $fullSetTitle;
      $subtitle = $fullsetSub;
    }
    if($packageChoice == 'pick6'){
      $titleName == $pick6Sub;
    }
  }



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

            <div class = "form-group text-start">
            <form name="extrasForm" id="extrasForm" action="reserve.php" method="get">
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
<?php
//footer
require('footer.php');
?>