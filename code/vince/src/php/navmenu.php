<link rel="stylesheet" href="../../css/navmenu.css">
<?php

$INDEX = 'index.php';
$PROFILE = 'viewprofile.php';
$EDIT_PROFILE = 'editprofile.php';
$LOGOUT = 'logout.php';
$LOGIN = 'login.php';
$SIGNUP = 'signup.php';
$CHANGE_PASSWORD = 'changepassword.php';

$ROOT = '../../';
$PHP_FOLDER = 'src/php/';

/* $path ='';

if($page_title != ''){
	if(isset($_SESSION['username'])){
	echo '<a href="../../'.$INDEX.'">Home</a>';
	echo '<a href="'.$PROFILE.'">&nbsp;View Profile</a>';
	echo '<a href="'.$EDIT_PROFILE.'">&nbsp;Edit Profile</a>';
	echo '<a href="'.$CHANGE_PASSWORD.'">&nbsp;Change Password</a>';
	echo '<a href="'.$LOGOUT.'">|Log Out (' . $_SESSION['username'].')</a>';
	
	}
	else{
		echo '<a href="../../'.$INDEX.'">Home</a>';
		echo '<a href="'.$LOGIN.'">Log In</a>';
		echo '<a href="'.$SIGNUP.'">&nbsp;Sign Up</a>';
	}
	}
	else{
	if(isset($_SESSION['username'])){
		echo '<a href="../../'.$INDEX.'">Home</a>';
		echo '<a href="src/php/'.$PROFILE.'">&nbsp;View Profile</a>';
		echo '<a href="src/php/'.$EDIT_PROFILE.'">&nbsp;Edit Profile</a>';
		echo '<a href="src/php/'.$CHANGE_PASSWORD.'">&nbsp;Change Password</a>';
		echo '<a href="src/php/'.$LOGOUT.'">&nbsp;Log Out (' . $_SESSION['username'].')</a>';
	}
	else{
		echo '<a href="../../'.$INDEX.'">Home</a>';
		echo '<a href="src/php/'.$LOGIN.'">Log In</a>';
		echo '<a href="src/php/'.$SIGNUP.'">&nbsp;Sign Up</a>';
	}
	} */
?>

<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?php echo $ROOT.$INDEX;?>">Jobaccino<?php echo $page_title;?></a>
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<?php
			if($page_title != ''){
			if(isset($_SESSION['username'])){
			echo '<li><a href='.$ROOT.$INDEX.'><span class="glyphicon glyphicon-home"></span> Home</a></li>';
			echo ' <li><a href="'.$PROFILE.'">View Profile</a></li>';
			echo ' <li><a href="'.$EDIT_PROFILE.'">Edit Profile</a></li>';
			echo ' <li><a href="'.$CHANGE_PASSWORD.'">Change Password</a></li>';
			//echo ' <li><a href="'.$LOGOUT.'">Log Out ('.$_SESSION['username'].')</a></li>';
			}
			else{
				echo '<li><a href='.$ROOT.$INDEX.'>Home</a></li>';
				//echo '<li><a href='.$LOGIN.'>Log In</a></li>';
				//echo '<li><a href='.$SIGNUP.'>Sign Up</a></li>';	
			}
			}
			else{
			if(isset($_SESSION['username'])){
				echo '<li><a href='.$ROOT.$INDEX.'><span class="glyphicon glyphicon-home"></span> Home</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$PROFILE.'">View Profile</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$EDIT_PROFILE.'">Edit Profile</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$CHANGE_PASSWORD.'">Change Password</a></li>';
				//echo ' <li><a href="'.$PHP_FOLDER.$LOGOUT.'">Log Out ('.$_SESSION['username'].')</a></li>';
			}
			else{
				echo '<li><a href='.$ROOT.$INDEX.'><span class="glyphicon glyphicon-home"></span> Home</a></li>';
				//echo '<li><a href='.$PHP_FOLDER.$LOGIN.'>Log In</a></li>';
				//echo '<li><a href='.$PHP_FOLDER.$SIGNUP.'>Sign Up</a></li>';
			}
			}
			?> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php
		if($page_title != ''){
			if(isset($_SESSION['username'])){
			//echo '<li><a href='.$ROOT.$INDEX.'>Home</a></li>';
			//echo ' <li><a href="'.$PROFILE.'">View Profile</a></li>';
			//echo ' <li><a href="'.$EDIT_PROFILE.'">Edit Profile</a></li>';
			//echo ' <li><a href="'.$CHANGE_PASSWORD.'">Change Password</a></li>';
			echo ' <li><a href="'.$LOGOUT.'">Log Out ('.$_SESSION['username'].')</a></li>';
			}
			else{
				//echo '<li><a href='.$ROOT.$INDEX.'>Home</a></li>';
				echo '<li><a href='.$LOGIN.'><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>';
				echo '<li><a href='.$SIGNUP.'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';	
			}
			}
			else{
			if(isset($_SESSION['username'])){
				//echo '<li><a href='.$ROOT.$INDEX.'>Home</a></li>';
				//echo ' <li><a href="'.$PHP_FOLDER.$PROFILE.'">View Profile</a></li>';
				//echo ' <li><a href="'.$PHP_FOLDER.$EDIT_PROFILE.'">Edit Profile</a></li>';
				//echo ' <li><a href="'.$PHP_FOLDER.$CHANGE_PASSWORD.'">Change Password</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$LOGOUT.'">Log Out ('.$_SESSION['username'].')</a></li>';
			}
			else{
				//echo '<li><a href='.$ROOT.$INDEX.'>Home</a></li>';
				echo '<li><a href='.$PHP_FOLDER.$LOGIN.'><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>';
				echo '<li><a href='.$PHP_FOLDER.$SIGNUP.'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
			}
			}
		?>
      </ul>
    </div>
  </div>
</nav>
</nav>
