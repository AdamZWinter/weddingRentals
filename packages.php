<?php

//packages.php
require('header.php');

$redirect = '<script>
window.location.href="packages.php";
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

  if(!isset($_GET['displaySets']) || $_GET['displaySets'] == 'false'){
    $displaySets = 'true';
  }else{
    $displaySets = 'true';
  }

  //var_dump($weddingMonth);

  $available = true;
  if($setOption == 'layeredarch' && $weddingMonth == 1){
    $available = false;
  }

  if($setOption == 'modernround' && $weddingMonth == 2){
    $available = false;
  }

  if($setOption == 'vintagemirror' && $weddingMonth == 3){
    $available = false;
  }

  if($setOption == 'darkwalnut' && $weddingMonth == 4){
    $available = false;
  }

  if($setOption == 'rusticwood' && $weddingMonth == 5){
    $available = false;
  }

  //var_dump($available);

  $availableTrue = $available ? 'd-block' : 'd-none';
  $availableFalse = !$available ? 'd-block' : 'd-none';

  $layeredArch = '
  <option class= "option-style" value= "fullSet-la">Full Set- $849</option>
  <option class= "option-style" value= "pickSix-la">Pick 6- $749</option>
  <option class= "option-style" value= "pick4-la">Pick 4- $649</option>
';
$modernRound = '
  <option class= "option-style" value= "fullSet-mr">Full Set- $799</option>
  <option class= "option-style" value= "pickSix-mr">Pick 6- $699</option>
  <option class= "option-style" value= "pick4-mr">Pick 4- $599</option>
';
$vintageMirror ='
  <option class= "option-style" value= "platinum-vm">Platinum Package Rental- $849</option>
  <option class= "option-style" value= "fullSet-vm">Gold Package Rental- $799</option>
  <option class= "option-style" value= "pickSix-vm">Pick 6- $649</option>
  <option class= "option-style" value= "pick4-vm">Pick 4- $599</option>
';
$walnutRustic= '
  <option class= "option-style" value= "fullSet-wr">Full Set- $299</option>
  <option class= "option-style" value= "pickSix-wr">Pick 6- $245</option>
  <option class= "option-style" value= "pick4-wr">Pick 4- $199</option>
';

if($setOption == 'rusticwood'| 'darkwalnut'){
$optionMarkup = $walnutRustic;
}
if($setOption == 'layeredarch'){
$optionMarkup = $layeredArch;
}
if($setOption == 'modernround'){
$optionMarkup = $modernRound;
}
if($setOption == 'vintagemirror'){
$optionMarkup = $vintageMirror;
}

$packageMarkup = '
<div class= row>
<div class="col-12 center">
<div class="form-group">     
<label for="set" class="rental-head">Choose Your Package:</label>

<br>
<select class="form-control select-style" id="packageChoice"></select>
</div>
</div>    
</div>   
';

?>


    <div class = "container-fluid">
      <div class = "row" style="height:300px">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">

            <p id="availableTrue">
                <br>
                <form name="conntinue2extras" id="conntinue2extras" action="extras.php" method="get" class="<?php echo $availableTrue;?>">
                    Great!  This set is available on <?php echo $weddingDate;?>
                    <br>
                    <br>
                    <input type="hidden" id="weddingDate" name="weddingDate" value="<?php echo $weddingDate;?>">
                    <input type="hidden" id="displaySets" name="displaySets" value="<?php echo $displaySets;?>">
                    <input type="hidden" id="setOption" name="setOption" value="<?php echo $setOption;?>">
                    <?php if($setOption == "layeredarch"){
                      echo $packageMarkup; 
                    }?>
                    <button type="submit" >Continue</button>
                </form>
            </p>

            <p id="availableFalse">
                <br>
                <form name="conntinue2extras" id="conntinue2extras" action="pickYourSet.php" method="get" class="<?php echo $availableFalse;?>">
                    Sorry, this set is not available on <?php echo $weddingDate;?>
                    <br>
                    <br>
                    <input type="hidden" id="weddingDate" name="weddingDate" value="<?php echo $weddingDate;?>">
                    <input type="hidden" id="displaySets" name="displaySets" value="<?php echo $displaySets;?>">
                    <input type="hidden" id="setOption" name="setOption" value="">
                    <button type="submit">Try a Different Set</button>
                </form>            
            </p>


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
