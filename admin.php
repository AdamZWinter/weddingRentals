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
//   echo '<table class= "tablesorter" id= "myTable" >';
//   echo '<thread>';
//   echo '<tr>';
//   echo '<td>';
//   echo "Date";
//   echo '</td>';
//   echo '<td>';
//   echo "Set";
//   echo '</td>';
//   echo '<td>';
//   echo "First";
//   echo '</td>';
//   echo '<td>';
//   echo "Last";
//   echo '</td>';
//   echo '<td>';
//   echo "Phone";
//   echo '</td>';
//   echo '<td>';
//   echo "Email";
//   echo '</td>';
//   echo '</tr>';
//   echo '</thread>';
//   echo '<tbody>';
  
  
  $query = "SELECT `reservations`.`dateUnix`, `reservations`.`dateHuman`, `reservations`.`signSetLang`, `customers`.`fname`, `customers`.`lname`, `customers`.`phone`, `customers`.`email`
  FROM `reservations` 
  LEFT JOIN `customers` ON `reservations`.`customerID` = `customers`.`email`
  WHERE 1 = 1
  ORDER BY `reservations`.`dateUnix` ASC";
  $result = $db->query($query);
  $tableData = '';
  if($result->num_rows == 0){
  //nothing to display
  }elseif ($result->num_rows > 0) {
      for($i = 0; $i < $result->num_rows; $i++){
          $result->data_seek($i);
          $row = $result->fetch_assoc();
          $tableData .= '<tr>';
          $tableData .=  '<td>';
          $tableData .=  $row["dateHuman"];
          $tableData .=  '</td>';
          $tableData .=  '<td>';
          $tableData .=  $row["signSetLang"];
          $tableData .=  '</td>';
          $tableData .=  '<td>';
          $tableData .=  $row["fname"];
          $tableData .=  '</td>';
          $tableData .=  '<td>';
          $tableData .=  $row["lname"];
          $tableData .=  '</td>';
          $tableData .=  '<td>';
          $tableData .=  $row["phone"];
          $tableData .=  '</td>';
          $tableData .=  '<td>';
          $tableData .=  $row["email"];
          $tableData .=  '</td>';
          $tableData .=  '</tr>';
          } 
  }else {
  //something went wrong
  }
 
 function() {
    ("#myTable").tablesorter();
  };

  



//footer

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">  
    <!-- load jQuery and tablesorter scripts -->
    <script type="text/javascript" src="/path/to/jquery-latest.js"></script>
    <script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script>

    <!-- tablesorter widgets (optional) -->
    <script type="text/javascript" src="/path/to/jquery.tablesorter.widgets.js"></script>  
</head>
<body>
<table class= "tablesorter" id= "myTable" >
<thread>
<tr>
  <td>Date</td>
  <td>Set</td>
  <td>First</td>
  <td>Last</td>
  <td>Phone</td>
  <td>Email</td>
</tr>
</thread>
<tbody> 
    <?php echo $tableData ?>
</tbody>
</body>
</html>
<?php 
require('footer.php');
?>