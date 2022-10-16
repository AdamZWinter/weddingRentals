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

  var_dump($_GET);

?>


    <div class = "container-fluid ">
      <div class = "row" style="height:300px">      
        <div class = "col-3 d-none d-md-block"></div>
        <div class = "col-1 d-none d-md-block"></div>
        <div class = "col-12 col-md-4 text-center">

            <div class = "form-group text-start">

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