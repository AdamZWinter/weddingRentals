<?php

//extras.php
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


  $hexarchAvailable = $weddingMonth == 1 ? 'disabled' : '';
  $couchAvailable = $weddingMonth == 2 ? 'disabled' : '';
  $antiquejugsAvailable = $weddingMonth == 3 ? 'disabled': '';
  $winejugsAvailable = $weddingMonth == 3 ? 'disabled': '';
  $clearjarsAvailable = $weddingMonth == 4 ? 'disabled': '';
  $bluejarsAvailable = $weddingMonth == 4 ? 'disabled': '';
  $deliveryAvailable = $weddingMonth == 5 ? 'disabled' : '';

  $extrasWarning = ($hexarchAvailable || $couchAvailable || $antiquejugsAvailable || $clearjarsAvailable || $deliveryAvailable) ? 'd-block' : 'd-none';
  //$extrasWarning = "d-block";

?>

<script>
  document.getElementById("headerImage").style.backgroundImage = "url('img/headerImages/signonTable.jpg')";
  document.getElementById("headerImage").style.backgroundPosition = "50% 67%";
  document.getElementById("headerImage").style.height = "300px";
</script>


    <div class = "container-fluid ">
      <div class = "row" style="height:300px">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">

            <div class = "form-group text-start">
            <form name="conntinue2extras" id="conntinue2extras" action="reserve.php" method="get">
                <input type="hidden" id="weddingDate" name="weddingDate" value="<?php echo $weddingDate;?>">
                <input type="hidden" id="displaySets" name="displaySets" value="<?php echo $displaySets;?>">
                <input type="hidden" id="setOption" name="setOption" value="<?php echo $setOption;?>">

                <label for="extras" class="rental-head">Choose Your Extras:</label>
                <br>
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
                <label for="delivery" class = "button option-style">Delivery <a href="delivery.html">?</a></label>
                <br>
                <br>
                <button class= "btn btn-primary button" type="submit">Continue</button>
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