<?php

//extras.php
require('header.php');

$redirect = '<script>
window.location.href="packages.php";
</script>';
  
  if(!$_GET[weddingDate] || $_GET[weddingDate] == '' || empty($_GET[weddingDate])){
    echo $redirect;
  }else{
    $weddingDate = $_GET[weddingDate];
    $dateArray = date_parse($weddingDate);
    $weddingMonth = $dateArray['month'];
  }

  if(!$_GET[setOption] || $_GET[setOption] == '' || empty($_GET[setOption])){
    echo $redirect;
  }else{
    $setOption = $_GET[setOption];
  }

  if($_GET[displaySets] == '' || empty($_GET[displaySets]) || $_GET[displaySets] == 'false'){
    $displaySets = 'true';
  }else{
    $displaySets = 'true';
  }

  if(!$_GET[hexarbor] || $_GET[hexarbor] == '' || empty($_GET[hexarbor])){
    //nothing
  }else{
    $hexarbor = true;
    $hexarborLang = 'Hexagonal Arbor';
  }

  if(!$_GET[vintagesofa] || $_GET[vintagesofa] == '' || empty($_GET[vintagesofa])){
    //nothing
  }else{
    $vintagesofa = true;
    $vintagesofaLang = 'Vintage Sofa';
  }

  if(!$_GET[antiquejugs] || $_GET[antiquejugs] == '' || empty($_GET[antiquejugs])){
    //nothing
  }else{
    $antiquejugs = true;
    $antiquejugsLang = 'Antique Jugs';
  }

  if(!$_GET[winejug] || $_GET[winejug] == '' || empty($_GET[winejug])){
    //nothing
  }else{
    $winejug = true;
    $winejugLang = 'Wine Jug';
  }

  if(!$_GET[clearjars] || $_GET[clearjars] == '' || empty($_GET[clearjars])){
    //nothing
  }else{
    $clearjars = true;
    $clearjarsLang = 'Wine Jug';
  }

  if(!$_GET[bluejars] || $_GET[bluejars] == '' || empty($_GET[bluejars])){
    //nothing
  }else{
    $bluejars = true;
    $bluejarsLang = 'Wine Jug';
  }

  if(!$_GET[delivery] || $_GET[delivery] == '' || empty($_GET[delivery])){
    //nothing
  }else{
    $delivery = true;
    $deliveryLang = 'Wine Jug';
  }

  switch ($setOption){
    case 'layeredarch':
        $setOption = 'Layered Arch';
        break;
    case 'modernround':
        $setOption = 'Modern Round';
        break;
    case 'vintagemirror':
        $setOption = 'Vintage Mirror';
        break;
    case 'darkwalnut':
        $setOption = 'Dark Walnut';
        break;
    case 'rusticwood':
        $setOption = 'Rustic Wood';
        break;
  }//end switch

  //var_dump($_GET);

?>


    <div class = "container-fluid ">
      <div class = "row" style="height:300px">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">

            <div class="text-start">
                <?php
                    echo 'Set Selection: '.$setOption;
                    echo 'Wedding Date: '.$weddingDate;
                    echo '<br>';
                    echo 'Extras: ';
                    echo $hexarborLang;
                    echo $vintagesofaLang;
                    echo $antiquejugsLang;
                    echo $winejugLang;
                    echo $clearjarsLang;
                    echo $bluejarsLang;
                    echo $deliveryLang;




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