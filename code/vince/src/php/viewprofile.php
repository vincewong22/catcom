<head>
	<link rel="stylesheet" type="text/css" href="../../css/viewprofile.css">
</head>
<?php
require_once('startsession.php');
require_once('appvars.php');
$page_title = ' View Profile';
require_once('header.php');
require_once('navmenu.php');

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

/* echo'<br/>';
if($result->num_rows >0)
	echo 'success grabbing table';
else
	echo 'failure grabbing table'; */


while($row = $result->fetch_assoc()){
echo '<br/>';
if(!$row['picture'] == '')
echo '<img src="'. IMAGE_PATH . $row['picture']. '"/>';
else
echo '<img src="'. APP_IMAGE_PATH . 'emptyprofile.jpg' . '"/>';
echo '<br/> first name: ' . $row['firstname'] ; 
echo '<br/> last name: ' . $row['lastname'] ; 
echo '<br/> email: ' . $row['email'] ; 
echo '<br/> birthdate: ' . $row['birthdate'] ; 
echo '<br/> join date: ' . $row['join_date'] ;

if($row['gender'] == 'N') 
	echo '<br/> gender: prefer not to say';
if($row['gender'] == 'M') 
	echo '<br/> gender: male';
if($row['gender'] == 'F') 
	echo '<br/> gender: female';
echo '<br/> profile image name: '.$row['picture'];


}
}
 require_once('footer.php');
?>
