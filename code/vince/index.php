<?php
//start the session:

session_start();
$page_title = '';
require_once('src/php/header.php');
require_once('src/php/appvars.php');
require_once('src/php/navmenu.php');

if(!isset($_SESSION['user_id'])){
	require_once('src/php/nologin_index.php');
	}
else
	echo 'logged in';

require_once('src/php/footer.php');
 ?>
 
