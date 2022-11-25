<?php
session_start();
//TODO: ADD SESSION TIMEOUT
//vardump.php
require('header.php');

require('../weddingRentals.conf.php');
require('utilities/DatabaseConnector.php');
require('./models/Packages.php');
require('./models/Extras.php');

$myDB = new DatabaseConnector();
$db = $myDB->getdb();

$redirect = '<script>
window.location.href="admin.html";
</script>';

if( !isset($_POST['username']) && !isset($_SESSION['username'])  ){
  echo $redirect;
} elseif (isset($_POST['username'])) {
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
   
    if((strcmp($username, 'admin') != 0)){
        echo $redirect;
    }
}
elseif(strcmp($_SESSION['username'], 'admin') != 0){
    echo $redirect;
}

if( !isset($_POST['password']) && !isset($_SESSION['password'])  ){
    echo $redirect;
  }
  elseif (isset($_POST['password'])) {
      $password = $_POST['password'];
      $_SESSION['password'] = $password;
     
      if((strcmp($password, 'admin') != 0)){
          echo $redirect;
      }
  }
  elseif(strcmp($_SESSION['password'], 'admin') != 0){
      echo $redirect;
  }
  echo '<table class= "tablesorter" id= "myTable" >';
  echo '<thread>';
  echo '<tr>';
  echo '<td>';
  echo "Date";
  echo '</td>';
  echo '<td>';
  echo "Set";
  echo '</td>';
  echo '<td>';
  echo "First";
  echo '</td>';
  echo '<td>';
  echo "Last";
  echo '</td>';
  echo '<td>';
  echo "Phone";
  echo '</td>';
  echo '<td>';
  echo "Email";
  echo '</td>';
  echo '</tr>';
  echo '</thread>';
  echo '<tbody>';
  
  
  $query = "SELECT `reservations`.`dateUnix`, `reservations`.`dateHuman`, `reservations`.`signSetLang`, `customers`.`fname`, `customers`.`lname`, `customers`.`phone`, `customers`.`email`
  FROM `reservations` 
  LEFT JOIN `customers` ON `reservations`.`customerID` = `customers`.`email`
  WHERE 1 = 1
  ORDER BY `reservations`.`dateUnix` ASC";
  $result = $db->query($query);
  if($result->num_rows == 0){
  //nothing to display
  }elseif ($result->num_rows > 0) {
      for($i = 0; $i < $result->num_rows; $i++){
          $result->data_seek($i);
          $row = $result->fetch_assoc();
          echo '<tr>';
          echo '<td>';
          echo $row["dateHuman"];
          echo '</td>';
          echo '<td>';
          echo $row["signSetLang"];
          echo '</td>';
          echo '<td>';
          echo $row["fname"];
          echo '</td>';
          echo '<td>';
          echo $row["lname"];
          echo '</td>';
          echo '<td>';
          echo $row["phone"];
          echo '</td>';
          echo '<td>';
          echo $row["email"];
          echo '</td>';
          echo '</tr>';
          } 
  }else {
  //something went wrong
  }
  echo '</tbody>';
  echo '</table>';
  $(function() {
    $("#myTable").tablesorter();
  });
  $(function() {
    $("#myTable").tablesorter();
  });

  



//footer
require('footer.php');
?>
<!-- load jQuery and tablesorter scripts -->
<script type="text/javascript" src="/path/to/jquery-latest.js"></script>
<script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script>

<!-- tablesorter widgets (optional) -->
<script type="text/javascript" src="/path/to/jquery.tablesorter.widgets.js"></script>