<link rel="stylesheet" href="../../css/navmenu.css">
<link rel="stylesheet" href="../../css/common.css">
<link rel="stylesheet" href="../../css/coffeeshop.css.css">
<?php

$INDEX = 'index.php';
$PROFILE = 'viewprofile.php';
$EDIT_PROFILE = 'editprofile.php';
$LOGOUT = 'logout.php';
$LOGIN = 'login.php';
$SIGNUP = 'signup.php';
$CHANGE_PASSWORD = 'changepassword.php';
$JOB_BOARD = 'jobboard.php';
$POST_JOB = 'postjob.php';
$ROOT = '../../';
$PHP_FOLDER = 'src/php/';



if(isset($_SESSION['user_id'])){
$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$sql = "SELECT * FROM USER_TABLE WHERE user_id =".$_SESSION['user_id'];
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){


$type = $row['profiletype']; 
}
if($type =='shop')
$PROFILE = 'viewcoffeeprofile.php';
if($type =='barista')
$PROFILE = 'myProfileBarista.php';
}


?>

<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?php echo $ROOT.$INDEX;?>"><span class="sitename">Jobaccino</span><span class="pagename"><?php echo $page_title;?></span></a>
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<?php
			//left side navbar
			//logged in - viewing non-index.php
			if($page_title != ''){
			if(isset($_SESSION['username'])){
			
			echo ' <li><a href="'.$PROFILE.'"><span class="glyphicon glyphicon-eye-open"></span> View Profile</a></li>';
			echo ' <li><a href="'.$EDIT_PROFILE.'"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>';
			echo ' <li><a href="'.$CHANGE_PASSWORD.'"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>';
			echo '<li><a href='.$JOB_BOARD.'><span class="glyphicon glyphicon-list-alt"></span> Job board</a></li>';
			echo ' <li><a href="'.$POST_JOB.'"><span class="glyphicon glyphicon-cog"></span> Post Job</a></li>';
			}
			else{ //not logged in
				echo '<li><a href='.$ROOT.$INDEX.'><span class="glyphicon glyphicon-home"></span> Home</a></li>';	
				echo '<li><a href='.$JOB_BOARD.'><span class="glyphicon glyphicon-list-alt"></span> Job board</a></li>';
			}
			}
			//logged in viewing non-index.php
			else{
			if(isset($_SESSION['username'])){
				echo '<li><a href='.$ROOT.$INDEX.'><span class="glyphicon glyphicon-home"></span> Home</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$PROFILE.'"><span class="glyphicon glyphicon-eye-open"></span> View Profile</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$EDIT_PROFILE.'"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$CHANGE_PASSWORD.'"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>';
				echo '<li><a href='.$PHP_FOLDER.$JOB_BOARD.'><span class="glyphicon glyphicon-list-alt"></span> Job board</a></li>';
				echo ' <li><a href="'.$PHP_FOLDER.$POST_JOB.'"><span class="glyphicon glyphicon-cog"></span> Post Job</a></li>';
			}
			else{ // not logged in 
				echo '<li><a href='.$ROOT.$INDEX.'><span class="glyphicon glyphicon-home"></span> Home</a></li>';
				echo '<li><a href='.$PHP_FOLDER.$JOB_BOARD.'><span class="glyphicon glyphicon-list-alt"></span> Job board</a></li>';
			}
			}
			?> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php
		//right side navbar
		if($page_title != ''){
			if(isset($_SESSION['username'])){
			echo ' <li><a href="'.$LOGOUT.'"> <span class="glyphicon glyphicon-user"></span> Log Out ('.$_SESSION['username'].')</a></li>';
			}
			else{
				echo '<li><a href='.$LOGIN.'><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>';
				echo '<li><a href='.$SIGNUP.'><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';	
			}
			}
			else{
			if(isset($_SESSION['username'])){
				echo ' <li><a href="'.$PHP_FOLDER.$LOGOUT.'"><span class="glyphicon glyphicon-user"></span> Log Out ('.$_SESSION['username'].')</a></li>';
			}
			else{ //not logged in viewing index.php
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
