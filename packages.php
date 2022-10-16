<?php

//packages.php
require('header.php');
  
  if(!$_GET[weddingDate] || $_GET[weddingDate] == '' || empty($_GET[weddingDate])){
    $weddingDate = date('Y-m-d');
  }else{
    $weddingDate = $_GET[weddingDate];
  }
  
  $redirect = '<script>
  window.location.href="packages.php";
  </script>';

  if(!$_GET[setOption] || $_GET[setOption] == '' || empty($_GET[setOption])){
    echo $redirect;
  }else{
    $setOption = $_GET[setOption];
  }
  
  $dateArray = date_parse($weddingDate);
  $weddingMonth = $dateArray['month'];

  var_dump($weddingMonth);

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

  

  var_dump($available);


?>






<?php

//comments
require('footer.php');
?>
