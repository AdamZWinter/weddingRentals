<?php
//Test comment
//packages.php
require('header.php');
require('../weddingRentals.conf.php');
require('utilities/DatabaseConnector.php');
require('./models/Packages.php');

$myDB = new DatabaseConnector();
$db = $myDB->getdb();

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
    $unixTime = mktime(0, 0, 0, $dateArray['month'], $dateArray['day'], $dateArray['year']);
  }

  if( !isset($_GET['setOption']) ){
    echo $redirect;
  }else{
    $setOption = $_GET['setOption'];
  }

  if( !isset($_GET['upsellPackage']) ){
    $upsellPackage = '';
  }else{
    $upsellPackage = $_GET['upsellPackage'];
  }

  //var_dump($weddingMonth);

  $available = true;
  $reservationRangeDays = 60 * 60 * 24 * 2;  //two days in seconds
  $daysLater = $unixTime + $reservationRangeDays;
  $daysBefore = $unixTime - $reservationRangeDays;
  $query = "SELECT * FROM `reservations` WHERE (`dateUnix` BETWEEN '".$daysBefore."' AND '".$daysLater."') AND `signSet` = '".$setOption."'";
  $result = $db->query($query);
  echo $result->num_rows;
  echo $setOption;
  while($row = mysqli_fetch_array($result)){
    echo $row['reservationID'];
  }
  
  if($result->num_rows == 0){
    //$available = true;  //already initialized as true
  }elseif ($result->num_rows == 1 && ($setOption == 'vintagemirror' || $setOption == 'darkwalnut' || $setOption == 'rusticwood')) {
    //$available = true;  //already initialized as true
  }else{
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

$packageListValue = "";

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


?>



<script>
  document.getElementById("headerImage").style.backgroundImage = "url('img/headerImages/signonTable.jpg')";
  document.getElementById("headerImage").style.backgroundPosition = "50% 67%";
  document.getElementById("headerImage").style.height = "300px";

  window.onload = (event) => {
    displayPackageDetails();
    getCheckedBoxes();
  };

</script>


<div class = "relative">
      <span class="text-style">Sets</span>
      <span class="text-style"> / </span>
      <span class="page-select">Packages</span>
      <span class="text-style"> / </span>
      <span class="text-style">Extras</span>
      <span class="text-style"> / </span>
      <span class="text-style">Reservation</span>
      <span class="text-style"> / </span>
      <span class="text-style">Confirmation</span>
  </div>

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
                    <input class="collapse" type="hidden" id="packageListCollapse" name="packageList" value="">
                  
                    <div class= row>
                    <div class="col-12 center">
                    <div class="form-group">     
                    <label for="packageChoice" class="rental-head">Choose Your Package:</label>

                    <br>
                    <select class="form-control select-style" id="packageChoice" name="packageChoice" onchange=" countHowManyBoxesAreChecked(); displayPackageDetails();">
                    <?php 
                      echo $optionMarkup; 
                    ?>
                    </select>
                    </div>
                    </div>    
                    </div> 

                    <button class = "btn btn-primary button" type="submit" onclick = "getCheckedBoxes()"   >Continue</button>  
          
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
                    <input type="hidden" id="packageList" name="packageList" value="2">
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
        <form class="formClass" id= "packageList" name="packageListForm" id="extrasForm" action="extras.php" method="get">
        <label for="packageCheckList" class="rental-head">Choose Your Set Items ( FULL SET INCLUDES ALL OF THE FOLLOWING ITEMS ):</label>
          <br>
          <br>
          <?php
            $i = 0;
            foreach($thisPackage->getPackageOptionsArray() as $optionDescription){
              echo '<input name = "check_list[]" value = "'.$i.'" type="checkbox">';
              echo '<label class = "option-style">'.$optionDescription.'</label>';
              echo '<br>';
              $i++;
            }
          ?>
        </form>
      </div>
    </div>
    <!-- Card collapse -->


  <script>

    function ensureItemsAreChosen(){
      optionChoiceDetails = document.getElementsByTagName("option")[optionChoice].text;
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');

      // if 4 or 6 items aren't chosen, alert
      if( optionChoiceDetails == "Pick 6- $749" && checkboxes.length < 6 ) {

        alert("You must choose 6 items!");
      }
      if( optionChoiceDetails == "Pick 4- $649" && checkboxes.length < 4 ) {

        alert("You must choose 4 items!");
      }
    }

  function displayPackageDetails() {

    var optionChoice = document.getElementById("packageChoice").selectedIndex;
      optionChoiceValue = document.getElementsByTagName("option")[optionChoice].value;
      optionChoiceDetails = document.getElementsByTagName("option")[optionChoice].text;
      //console.log( optionChoiceValue + " was chosen");
      //console.log( "Option choice details: " + optionChoiceDetails);

      if(optionChoiceValue != null ){
        document.getElementById("collapseDiv").className = "collapse show";
      }
      if(optionChoiceDetails == "Full Set- $849" || optionChoiceDetails == "Full Set- $799"
          || optionChoiceDetails == "Full Set- $299"  ){
        // check every checkbox
        checkAllBoxes();
        countHowManyBoxesAreChecked();

      }
      if( optionChoiceDetails == "Pick 6- $749" || optionChoiceDetails == "Pick 6- $699"
          || optionChoiceDetails == "Pick 6- $245"  ) {

        // allow user to pick just 6 boxes
        clearCheckBoxes();
        countHowManyBoxesAreChecked();
      }
      if( optionChoiceDetails == "Pick 4- $649" || optionChoiceDetails == "Pick 4- $599" 
          || optionChoiceDetails == "Pick 4- $199" ) {

        // allow user to pick just 4 boxes
        clearCheckBoxes();
        countHowManyBoxesAreChecked();

      }
  }

  function countHowManyBoxesAreChecked(){
    var optionChoice = document.getElementById("packageChoice").selectedIndex;
    var optionChoiceDetails = document.getElementsByTagName("option")[optionChoice].text;
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for(var i = 0; i < checkboxes.length; i++ ){
      

      checkboxes[i].onchange = function(){
        getCheckedBoxes();
        var count = 0;


        for(var i = 0; i < checkboxes.length; i++ ){
          var box = checkboxes[i];
          if (box.checked) {
            count++;
          }
          if( (count < 4) && (optionChoiceDetails == "Pick 4- $649" || optionChoiceDetails == "Pick 4- $599") 
                          || optionChoiceDetails == "Pick 4- $199") {
            enableAllCheckboxes();
          }
          if( (count = 4) && (optionChoiceDetails == "Pick 4- $649" || optionChoiceDetails == "Pick 4- $599")
                          || optionChoiceDetails == "Pick 4- $199") {
            check4Boxes();
          }
          if( (count < 6) && (optionChoiceDetails == "Pick 6- $749" || optionChoiceDetails == "Pick 6- $699")
                          || optionChoiceDetails == "Pick 6- $245") {
            enableAllCheckboxes();
          }
          if( (count = 6) && (optionChoiceDetails == "Pick 6- $749" || optionChoiceDetails == "Pick 6- $699")
                          || optionChoiceDetails == "Pick 6- $245"){
            check6Boxes();
            break;
          }
          
        }         
      }
        
    }
  }
    

  function check6Boxes() {
    var count = 0;
    var maxCount = 6;
    var boxesThatAreChecked = [];
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

     
    for(var i = 0; i < checkboxes.length; i++ ){
      var box = checkboxes[i];
      if (box.checked) {
        count++;
        boxesThatAreChecked.push(box);
      }
     if(boxesThatAreChecked.length == maxCount){
        //console.log("MAX COUNT HAS BEEN REACHED " + count);

        // if checkbox is not in boxesThatAreChecked - disable it
      for(var i = 0; i < checkboxes.length; i++ ){
        if( !boxesThatAreChecked.includes(checkboxes[i])){
          checkboxes[i].disabled = true;
        }

      }
      }

    }
  
  }
  function enableAllCheckboxes(){
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for(var i = 0; i < checkboxes.length; i++ ){
      var box = checkboxes[i];
      box.disabled = false;

    }

  }


  function check4Boxes() {
    var count = 0;
    var maxCount = 4;
    var boxesThatAreChecked = [];
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    for(var i = 0; i < checkboxes.length; i++ ){
      var box = checkboxes[i];
      if (box.checked) {
        count++;
        boxesThatAreChecked.push(box);
      }
     if(boxesThatAreChecked.length == maxCount){
        console.log("MAX COUNT HAS BEEN REACHED " + count);

        // if checkbox is not in boxesThatAreChecked - disable it
      for(var i = 0; i < checkboxes.length; i++ ){
        if( !boxesThatAreChecked.includes(checkboxes[i])){
          checkboxes[i].disabled = true;
        }
        

      }
      }

    }
  
  }

  function clearCheckBoxes() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = false;
      checkbox.disabled = false;
    }
  }

      
  function checkAllBoxes() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = true;
      checkbox.disabled = false;

    }
  }




  function getCheckedBoxes(){
    
    

    console.log("value function is called");

    var checkedBoxes = new Array();
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var valueToPass = "";

    for (var checkbox of checkboxes) {
      if( checkbox.checked ){
        checkedBoxes.push(checkbox.value);
        valueToPass += (checkbox.value + ", ");
      }
    }
    //console.log(checkedBoxes);
    var packageListValue = document.getElementById("packageListCollapse");


    packageListValue.setAttribute("value", valueToPass );  
    console.log("The current 'value': " + packageListValue.getAttribute("value"));
    
    
    var x = "<?php echo "$packageListValue"?>";
    x = valueToPass;

  }
    

  
    
  </script>


  

<?php
//footer
require('footer.php');
?>
