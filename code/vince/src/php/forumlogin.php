<?php

//ob_clean
//ob_start();

//
require_once('startsession.php');
require_once('appvars.php');
$page_title = 'View Profile';
require_once('header.php');
require_once('navmenu.php');

///connect to database

$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	
		if($conn->connect_error)
			echo 'connection failure';
		else
			echo'connection to database successful...';
		
		
require_once 'forum/includes/functions.php';
?>