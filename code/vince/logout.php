<?php
//if user is logged in, delete the session to begin with
session_start();
session_destroy();

if(isset($_SESSION['user_id']))
	$_SESSION = array(); //clear session array



header('Location: index.php');
?>