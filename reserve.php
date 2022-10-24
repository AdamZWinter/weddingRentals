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

  $hexarborLang ='';
  $vintagesofaLang ='';
  $antiquejugsLang ='';
  $winejugLang ='';
  $clearjarsLang ='';
  $bluejarsLang ='';
  $deliveryLang ='';

  $extras = [];

  // create list of prices to add
  $totalPrice = [];

  if( !isset($_GET['hexarbor']) ){
    //nothing
  }else{
    $hexarbor = true;
    $hexarborLang = 'Hexagonal Arbor';
    array_push($extras, 'Hexagonal Arbor');
    array_push($totalPrice, 350);
  }

  if( !isset($_GET['vintagesofa']) ){
    //nothing
  }else{
    $vintagesofa = true;
    $vintagesofaLang = 'Vintage Sofa';
    array_push($extras, 'Vintage Sofa');
    array_push($totalPrice, 99);
  }

  if( !isset($_GET['antiquejugs']) ){
    //nothing
  }else{
    $antiquejugs = true;
    $antiquejugsLang = 'Antique Jugs';
    array_push($extras, 'Antique Jugs');
    array_push($totalPrice, 4);
  }

  if( !isset($_GET['winejug']) ){
    //nothing
  }else{
    $winejug = true;
    $winejugLang = 'Wine Jug';
    array_push($extras, 'Wine Jug');
    array_push($totalPrice, 20);
  }

  if( !isset($_GET['clearjars']) ){
    //nothing
  }else{
    $clearjars = true;
    $clearjarsLang = 'Clear Jars';
    array_push($extras, 'Clear Jars');
    array_push($totalPrice, 30);
  }

  if( !isset($_GET['bluejars']) ){
    //nothing
  }else{
    $bluejars = true;
    $bluejarsLang = 'Blue Jars';
    array_push($extras, 'Blue Jars');
    array_push($totalPrice, 30);
  }

  if( !isset($_GET['delivery']) ){
    //nothing
  }else{
    $delivery = true;
    $deliveryLang = 'Wine Jug';
    array_push($extras,'Delivery');
  }

  switch ($setOption){
    case 'layeredarch':
        $setOption = 'Layered Arch';
        array_push($totalPrice, 849);
        break;
    case 'modernround':
        $setOption = 'Modern Round';
        array_push($totalPrice, 799);
        break;
    case 'vintagemirror':
        $setOption = 'Vintage Mirror';
        array_push($totalPrice, 849);
        break;
    case 'darkwalnut':
        $setOption = 'Dark Walnut';
        array_push($totalPrice, 299);
        break;
    case 'rusticwood':
        $setOption = 'Rustic Wood';
        array_push($totalPrice, 299);
        break;
  }//end switch

  //var_dump($_GET);

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

            <div class="text-start">
                <?php
                    echo 'Set Selection: '.$setOption;
                    echo '<br>';
                    echo 'Wedding Date: '.$weddingDate;
                    echo '<br>';
                    echo 'Extras: ';
                    
                      foreach ($extras as $extra){
                          echo '<br>';
                          echo '- ' .$extra ;

                      }

                    echo '<br>';
                    echo 'Estimated Total price: $' . array_sum($totalPrice);
                    


                ?>
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