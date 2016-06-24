<?php
include_once('appvars.php');

session_start();

if(!isset($_SESSION['user_id'])){
	echo '<a href="login.php">Please login</a>';
	exit(); //stop executing the script
}
else{
	$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	
		if($conn->connect_error)
			echo 'connection failure';
		else
			echo'connection to database successful...';
	
	echo'You are logged in as: ' . $_SESSION['username'];
	
	$sql = "SELECT * FROM USER_TABLE WHERE user_id=".$_SESSION[user_id];

$result = $conn->query($sql);

if($result->num_rows >0)
	echo 'success grabbing table';
else
	echo 'failure grabbing table';


while($row = $result->fetch_assoc()){

echo '<br/>id: ' . $row['id'] . ' first name: ' . $row['firstname'] ; 
}
}
?>