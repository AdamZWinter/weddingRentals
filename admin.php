<?php
session_start();
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
        // echo 'problem here 1';
    }
}
elseif(strcmp($_SESSION['username'], 'admin') != 0){
    echo $redirect;
    // echo 'problem here 2';
}

if( !isset($_POST['password']) && !isset($_SESSION['password'])  ){
    echo $redirect;
  }
  elseif (isset($_POST['password'])) {
      $password = $_POST['password'];
      $_SESSION['password'] = $password;
     
      if((strcmp($password, 'admin') != 0)){
          echo $redirect;
        // echo 'problem here 3';
      }
  }
  elseif(strcmp($_SESSION['password'], 'admin') != 0){
      echo $redirect;
    // echo 'problem here 4';
  }

// echo '<table>';
// echo '<tr>';
// echo '<td>';
// echo "Date";
// echo '</td>';
// echo '<td>';
// echo "Set";
// echo '</td>';
// echo '<td>';
// echo "First";
// echo '</td>';
// echo '<td>';
// echo "Last";
// echo '</td>';
// echo '<td>';
// echo "Phone";
// echo '</td>';
// echo '<td>';
// echo "Email";
// echo '</td>';
// echo '</tr>';
//SORT CODE START
//prevents SQL injection by using array for col names
$columns = array('dateHuman', 'signSetLang', 'fname', 'lname', 'phone', 'email');
//Determins which column we sort by
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

if($resultSort = $db->query('SELECT `reservations`.`dateUnix`, `reservations`.`dateHuman`, `reservations`.`signSetLang`, `customers`.`fname`, `customers`.`lname`, `customers`.`phone`, `customers`.`email`
FROM `reservations` 
LEFT JOIN `customers` ON `reservations`.`customerID` = `customers`.`email`
WHERE 1 = 1
ORDER BY ' . $column . ' ' . $sort_order)){
    //uses font awesome to get up and down icons
    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	




//SORT CODE FINISH
// $query = "SELECT `reservations`.`dateUnix`, `reservations`.`dateHuman`, `reservations`.`signSetLang`, `customers`.`fname`, `customers`.`lname`, `customers`.`phone`, `customers`.`email`
// FROM `reservations` 
// LEFT JOIN `customers` ON `reservations`.`customerID` = `customers`.`email`
// WHERE 1 = 1
// ORDER BY `reservations`.`dateUnix` ASC";
// $result = $db->query($query);
// if($result->num_rows == 0){
// //nothing to display
// }elseif ($result->num_rows > 0) {
//     for($i = 0; $i < $result->num_rows; $i++){
//         $result->data_seek($i);
//         $row = $result->fetch_assoc();
//         echo '<tr>';
//         echo '<td>';
//         echo $row["dateHuman"];
//         echo '</td>';
//         echo '<td>';
//         echo $row["signSetLang"];
//         echo '</td>';
//         echo '<td>';
//         echo $row["fname"];
//         echo '</td>';
//         echo '<td>';
//         echo $row["lname"];
//         echo '</td>';
//         echo '<td>';
//         echo $row["phone"];
//         echo '</td>';
//         echo '<td>';
//         echo $row["email"];
//         echo '</td>';
//         echo '</tr>';
//         } 
// }else {
// //something went wrong
// }

// echo '</table>';
// //$setOption = $thisPackage->getSetName();
// //$setOptionLang = $thisPackage->getSetNameLang();
// //$packageChoice = $thisPackage->getSubsetType();
// //$packageChoiceLang = $thisPackage->getSubsetTypeLang();

?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Admin Table</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			th {
				background-color: #54585d;
				border: 1px solid #54585d;
			}
			th:hover {
				background-color: #64686e;
			}
			th a {
				display: block;
				text-decoration:none;
				padding: 10px;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
			}
			th a i {
				margin-left: 5px;
				color: rgba(255,255,255,0.4);
			}
			td {
				padding: 10px;
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #ffffff;
			}
			tr .highlight {
				background-color: #f9fafb;
			}
			</style>
		</head>
        <body>
            <table>
                <tr>
                <th><a href="admin.php?column=dateHuman&order=<?php echo $asc_or_desc; ?>">Date<i class="fas fa-sort<?php echo $column == 'dateHuman' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="admin.php?column=fname&order=<?php echo $asc_or_desc; ?>">First Name<i class="fas fa-sort<?php echo $column == 'fname' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="admin.php?column=lname&order=<?php echo $asc_or_desc; ?>">Last Name<i class="fas fa-sort<?php echo $column == 'lname' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="admin.php?column=signSetLang&order=<?php echo $asc_or_desc; ?>">Set<i class="fas fa-sort<?php echo $column == 'signSetLang' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="admin.php?column=phone&order=<?php echo $asc_or_desc; ?>">Phone<i class="fas fa-sort<?php echo $column == 'phone' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a href="admin.php?column=email&order=<?php echo $asc_or_desc; ?>">Email<i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <!-- Add other columns -->
                </tr>
                <?php while ($row = $resultSort->fetch_assoc()) : ?>
                    <tr>
                    <td<?php echo $column == 'dateHuman' ? $add_class : ''; ?>><?php echo $row['dateHuman']; ?></td>
                    <td<?php echo $column == 'fname' ? $add_class : ''; ?>><?php echo $row['fname']; ?></td>
                    <td<?php echo $column == 'lname' ? $add_class : ''; ?>><?php echo $row['lname']; ?></td>
                    <td<?php echo $column == 'signSetLang' ? $add_class : ''; ?>><?php echo $row['signSetLang']; ?></td>
                    <td<?php echo $column == 'phone' ? $add_class : ''; ?>><?php echo $row['phone']; ?></td>
                    <td<?php echo $column == 'email' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
                    </tr>
                    <?php endwhile; ?>
            </table>
        </body>
        </html>
        <?php 
        $resultSort-> free();
                }
        ?>


  


<?php
//footer
require('footer.php');
?>