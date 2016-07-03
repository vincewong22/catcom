<?php
//start the session:

session_start();
$page_title = '';
require_once('src/php/header.php');
require_once('src/php/appvars.php');
require_once('src/php/navmenu.php');
require_once('src/php/nologin_index.php');


if(!isset($_SESSION['user_id'])){
	require_once('src/php/nologin_index.php');
	}
else{
		$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

$sql = "SELECT * FROM USER_TABLE WHERE user_id =".$_SESSION['user_id'];

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
echo '<br/>profile type: ' . $row['profiletype']; 
}
		
		

	echo '<br/>logged in';
}
require_once('src/php/footer.php');
 ?>
 
