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
//will redirect to login after 30 minutes of inactivity
if(isset($_SESSION["username"])){
    if(time() - $_SESSION["login_time"] > 600){
        session_unset();
        session_destroy();
        echo $redirect;
    }
  }else{
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
      $_SESSION["login_time"] = time();
     
      if((strcmp($password, 'admin') != 0)){
          echo $redirect;
      }
  }
  elseif(strcmp($_SESSION['password'], 'admin') != 0){
      echo $redirect;
  }
}
  if( !isset($_GET['statusChange']) && !isset($_GET['email'])){

    //set individually
    // SET `reservations`.`status` = '".$status."'  
    // WHERE `customers`.`email` = '".$email."'

    //set all
    // SET `reservations`.`status` = 'unconfirmed'  


  }else{
    $status = $_GET['statusChange'];
    $email = $_GET['email'];
    $db->query("UPDATE `reservations` 
    LEFT JOIN `customers`  ON `reservations`.`customerID` = `customers`.`email`
    SET `reservations`.`status` = '".$status."'  
    WHERE `customers`.`email` = '".$email."'
    ");
  }
  
  

//SORT CODE START
//prevents SQL injection by using array for col names
$columns = array('dateHuman', 'signSetLang', 'fname', 'lname', 'phone', 'email', 'status', 'altFirstName', 'altLastName', 'altEmail', 'altPhone');
//Determins which column we sort by
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

if($resultSort = $db->query('SELECT `reservations`.`dateUnix`, `reservations`.`dateHuman`, `reservations`.`signSetLang`, `customers`.`fname`, `customers`.`lname`, `customers`.`phone`, `customers`.`email`, `reservations`.`status`,
`extras`.`extrasJSON`, `customers`.`altEmail`, `customers`.`altFirstName`, `customers`.`altLastName`, `customers`.`altPhone`
FROM `reservations` 
LEFT JOIN `customers` ON `reservations`.`customerID` = `customers`.`email`
LEFT JOIN `extras` ON `extras`.`reservationID` = `reservations`.`reservationID`
WHERE 1 = 1
ORDER BY ' . $column . ' ' . $sort_order)){
    //uses font awesome to get up and down icons
    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';





//SORT CODE FINISH

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
				background-color: #d5b6ae;
				border: 1px solid #808080;
			}
			th:hover {
				background-color: #808080;
			}
            .link:hover{
                color: #d5b6ae;
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
            <br><br>
            <div class= "center">
            <table>
                <tr>
                <th><a class ="link" href="admin.php?column=dateHuman&order=<?php echo $asc_or_desc; ?>">Date<i class="fas fa-sort<?php echo $column == 'dateHuman' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=fname&order=<?php echo $asc_or_desc; ?>">First Name<i class="fas fa-sort<?php echo $column == 'fname' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=lname&order=<?php echo $asc_or_desc; ?>">Last Name<i class="fas fa-sort<?php echo $column == 'lname' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=signSetLang&order=<?php echo $asc_or_desc; ?>">Set<i class="fas fa-sort<?php echo $column == 'signSetLang' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=phone&order=<?php echo $asc_or_desc; ?>">Phone<i class="fas fa-sort<?php echo $column == 'phone' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=email&order=<?php echo $asc_or_desc; ?>">Email<i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=altFirstName&order=<?php echo $asc_or_desc; ?>">Alternate First Name<i class="fas fa-sort<?php echo $column == 'altFirstName' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=altLastName&order=<?php echo $asc_or_desc; ?>">Alternate Last Name<i class="fas fa-sort<?php echo $column == 'altLastName' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=altPhone&order=<?php echo $asc_or_desc; ?>">Alternate Phone<i class="fas fa-sort<?php echo $column == 'altPhone' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a class ="link" href="admin.php?column=altEmail&order=<?php echo $asc_or_desc; ?>">Alternate Email<i class="fas fa-sort<?php echo $column == 'altEmail' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a  class = "link">Extras</a></th>
                <th><a class ="link" href="admin.php?column=status&order=<?php echo $asc_or_desc; ?>">Status<i class="fas fa-sort<?php echo $column == 'status' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                <th><a  class = "link">Change Status</a></th>
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
                    <td<?php echo $column == 'altFirstName' ? $add_class : ''; ?>><?php echo $row['altFirstName']; ?></td>
                    <td<?php echo $column == 'altLastName' ? $add_class : ''; ?>><?php echo $row['altLastName']; ?></td>
                    <td<?php echo $column == 'altPhone' ? $add_class : ''; ?>><?php echo $row['altPhone']; ?></td>
                    <td<?php echo $column == 'altEmail' ? $add_class : ''; ?>><?php echo $row['altEmail']; ?></td>
                    <td<?php echo $column == 'extrasJSON' ? $add_class : ''; ?>><?php
                    $data = json_decode($row['extrasJSON']);
                    echo "<ul>";
                    if(count($data) > 0){
                        foreach($data as $extra){
                            echo "<li>$extra</li>";
                        }
                    }
                    echo "</ul>";
                    
                    ?></td>
                    <td<?php echo $column == 'status' ? $add_class : ''; ?>><?php echo $row['status']; ?></td>
                    <td>
                        
                        <form action="admin.php" method="get">
                            <div class= "d-flex">
                            <input type="hidden" id="email" name="email" value="<?php echo $row['email']; ?>">
                                <select name= "statusChange" id="statusChange">
                                    <option  value= "confirmed">Confirmed</option>
                                    <option value= "canceled">Canceled</option>                                    
                                </select>                                                              
                                <button class= "btn btn-primary button" type = "submit">Update</button>
                            </div>
                        </form>

                       
                    </td>
                    </tr>
                    <?php endwhile; ?>
            </table>
                </div>
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