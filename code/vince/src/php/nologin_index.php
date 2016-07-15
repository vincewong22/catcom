<link rel="stylesheet" type="text/css" href="../../css/index.css">
<?php

/* if(isset($_SESSION['username'])){
	echo '<a href="src/viewprofile.php">View Profile</a><br/>';
	echo '<a href="src/editprofile.php">Edit Profile</a><br/>';
	echo '<a href="src/logout.php">Log out (' . $_SESSION['username'].')</a><br/>';
}
else{
	echo '<a href="src/login.php">Log In</a><br/>';
	echo '<a href="src/signup.php">Sign Up</a><br/>';
	
} */


$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

echo '<br/>';
?>

<div class="row">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style=" width:100%; !important;">
    <div class="item active">
      <img src="../../images/front_page/pic1.jpg">
    </div>

	<div class="carousel-caption">
        <p>Welcome to Jobaccino - The best resource for coffee related jobs on the web!</p>
		<br>
      </div>
	  
    <div class="item">
      <img src="../../images/front_page/pic2.jpg">
    </div>

    <div class="item">
     <img src="../../images/front_page/pic3.jpg">
    </div>

    <div class="item">
      <img src="../../images/front_page/pic4.jpg">
    </div>
  </div>


</div>
</div>
<?php
/* if($conn->connect_error)
	echo 'error connecting'.$conn->connect_error;
else
	echo 'success connecting...'; */


$sql = "SELECT * FROM USER_TABLE";

$result = $conn->query($sql);

echo'<br/>';
/*  if($result->num_rows >0)
	echo 'success grabbing table';
else
	echo 'failure grabbing table';  */

echo 'Most recent members: ';

while($row = $result->fetch_assoc()){

echo '<br/>username: ' . $row['username'] ; 

}
?>