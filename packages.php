<?php
//Test comment
//packages.php
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

  if( !isset($_GET['upsellPackage']) ){
    $upsellPackage = '';
  }else{
    $upsellPackage = $_GET['upsellPackage'];
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

  //selected logic to handle extras package upsell
  if($upsellPackage == 'fullset'){
    $fullSelected = 'selected';
  }
  else{
    $fullSelected = '';
  }
  
  if($upsellPackage == 'pick6' || $upsellPackage == 'vmpick6'){
    $sixSelected = 'selected';
  }else{
    $sixSelected = '';
  }

  if($upsellPackage == 'platinum'){
    $platinumSelected = 'selected';
  }else{
    $platinumSelected = '';
  }
  if($upsellPackage == 'gold'){
    $goldSelected = 'selected';
  }else{
    $goldSelected = '';
  }


  $layeredArch = '
  <option class= "option-style" value= "fullset"'.$fullSelected.'>Full Set- $849</option>
  <option class= "option-style" value= "pick6"'.$sixSelected.'>Pick 6- $749</option>
  <option class= "option-style" value= "pick4">Pick 4- $649</option>
';
$modernRound = '
  <option class= "option-style" value= "fullset"'.$fullSelected.'>Full Set- $799</option>
  <option class= "option-style" value= "pick6"'.$sixSelected.'>Pick 6- $699</option>
  <option class= "option-style" value= "pick4">Pick 4- $599</option>
';
$vintageMirror ='
  <option class= "option-style" value= "platinum"'.$platinumSelected.'>Platinum Package Rental- $849</option>
  <option class= "option-style" value= "gold"'.$goldSelected.'>Gold Package Rental- $799</option>
  <option class= "option-style" value= "vmpick6"'.$sixSelected.'>Pick 6- $649</option>
  <option class= "option-style" value= "vmpick4">Pick 4- $599</option>
';
$walnutRustic= '
  <option class= "option-style" value= "fullset"'.$fullSelected.'>Full Set- $299</option>
  <option class= "option-style" value= "pick6"'.$sixSelected.'>Pick 6- $245</option>
  <option class= "option-style" value= "pick4">Pick 4- $199</option>
';

if($setOption == 'layeredarch'){
  $optionMarkup = $layeredArch;
  $thisPackage = new LayeredArchPackage();
}
if($setOption == 'modernround'){
    $optionMarkup = $modernRound;
    $thisPackage = new ModernRoundPackage();
}
if($setOption == 'vintagemirror'){
    $optionMarkup = $vintageMirror;
    $thisPackage = new VintageMirrorPackage();
}
if($setOption ==  'darkwalnut'){
  $optionMarkup = $walnutRustic;
  $thisPackage = new DarkWalnutPackage();
}
if($setOption == 'rusticwood'){
  $optionMarkup = $walnutRustic;
  $thisPackage = new RusticWoodPackage();
}


$packageMarkup = '
<div class= row>
<div class="col-12 center">
<div class="form-group">     
<label for="packageChoice" class="rental-head">Choose Your Package:</label>

<br>
<select class="form-control select-style" id="packageChoice" name="packageChoice" onchange="displayPackageDetails();">
'.$optionMarkup.'
</select>
</div>
</div>    
</div>   
';


$layeredArchFullSetPackageDetails = '
<label for="packageItemsForm" class="rental-head">INCLUDES EACH OF THE FOLLOWING ITEMS:</label>              
                <input  type="checkbox" id="hexarbor" name="hexarbor">
                <label for="hexarbor" class = "option-style">  Hexagon Arbor</label>
                <br>
                <input  type="checkbox" id="hexarbor" name="hexarbor">
                <label for="vintagesofa" class = "option-style"> Vintage Sofa</label>
                <br>
                <input  type="checkbox" id="hexarbor" name="hexarbor">
                <label for="antiquejugs" class = "option-style"> Antique Gallon Jugs</label>   
                <br>
                <input  type="checkbox" id="hexarbor" name="hexarbor">
                <label for="winejug" class = "option-style"> XL Wine Jugs</label>
                <br>
                <input  type="checkbox" id="hexarbor" name="hexarbor">
                <label for="clearjars" class = "option-style"> Clear Antique Ball Jars</label>
                <br>
                <input  type="checkbox" id="hexarbor" name="hexarbor">
                <label for="bluejars" class = "option-style"> Blue Antique Ball Jars</label>
                <br>
                <br>
                <input  type="checkbox" id="hexarbor" name="hexarbor">

';


$packageCheckList = '
            <form name="packageItemsForm" id="packageItemsForm" action="packages.php" method="get">
            '.$packageListMarkup.'
                <input type="submit" value="Continue">
            </form>
           
';



?>



<script>
  document.getElementById("headerImage").style.backgroundImage = "url('img/headerImages/signonTable.jpg')";
  document.getElementById("headerImage").style.backgroundPosition = "50% 67%";
  document.getElementById("headerImage").style.height = "300px";
</script>



    <div class = "container-fluid">
      <div class = "row" style="height:300px">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-md-4 text-center center">

            <p id="availableTrue">
                <br>
                <form name="conntinue2extras" id="conntinue2extras" action="extras.php" method="get" class="form-align <?php echo $availableTrue;?>">
                    Great!  This set is available on <?php echo $weddingDate;?>
                    <br>
                    <br>
                    <input type="hidden" id="packageCode" name="packageCode" value="<?php echo $thisPackage->getCode();?>">
                    <input type="hidden" id="weddingDate" name="weddingDate" value="<?php echo $weddingDate;?>">
                    <input type="hidden" id="displaySets" name="displaySets" value="<?php echo $displaySets;?>">
                    <input type="hidden" id="setOption" name="setOption" value="<?php echo $setOption;?>">
                    <?php 
                      echo $packageMarkup; 
                    ?>
                    <button class = "btn btn-primary button" type="submit" >Continue</button>                             
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
      
      </div><!--End of container-fluid-->




    <!-- Collapse that displays the Package checkboxes  -->
    <div class="collapse" id="collapseDiv">
      <div class="card card-body">

      <h1 id= "insertInfo"><?php echo $packageCheckList;?></h1>
    </div><!-- Card collapse -->


  <script>
  
  function displayPackageDetails() {

    var optionChoice = document.getElementById("packageChoice").selectedIndex;
      optionChoiceValue = document.getElementsByTagName("option")[optionChoice].value;
      optionChoiceDetails = document.getElementsByTagName("option")[optionChoice].text;
      console.log( optionChoiceValue + " was chosen");
      console.log( "Option choice details: " + optionChoiceDetails);

      if(optionChoiceValue != null ){
        document.getElementById("collapseDiv").className = "collapse show";
      }
      // if(optionChoiceDetails == "Full Set- $849" ){
        // showLayeredArchFullSetPackage();
      // }
      // else {
        // document.getElementById("insertInfo").innerHTML = "not layered arch";

      // }
  }
    
      
    

    function showLayeredArchFullSetPackage(){
      document.getElementById("insertInfo").innerHTML = "LayeredArch full set";
    }
    
  </script>


  

<?php
//footer
require('footer.php');
?>
