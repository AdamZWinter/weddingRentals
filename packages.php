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

  $layeredArchMarkup = '
  <div class= row>
  <div class="col-6">
  <div class="form-group">     
    <label for="set" class="rental-head">Choose Your Package:</label>
  
    <br>
    <select class="form-control select-style" id="packageChoice">
      <option class= "option-style" value= "fullSet">Full Set- $849</option>
      <option class= "option-style" value= "pickSix">Pick 6- $749</option>
      <option class= "option-style" value= "pick4">Pick 4- $649</option>
      
    </select>
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
                      echo $layeredArchMarkup; 
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
