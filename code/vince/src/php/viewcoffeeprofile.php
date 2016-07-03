
<link rel="stylesheet" type="text/css" href="../../css/coffeeshop.css">

<?php
require_once('startsession.php');
require_once('appvars.php');
$page_title = 'Coffee Shops';
require_once('header.php');
require_once('navmenu.php');

$ROOT = '../../';
$IMAGES = 'images/';

if(!isset($_SESSION['user_id'])){
	echo '<a href="login.php">Please login</a>';
	exit(); //stop executing the script
}else{
	$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$sql = "SELECT * FROM USER_TABLE WHERE user_id=".$_SESSION[user_id];
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$name = $row['firstname'];
	$city = $row['city'];
	$province = $row['province'];
	$address = $row['address'];
	$number = $row['number'];
	$intro = $row['intro'];
	$picture = $row['picture'];
	
	
	$sql = "SELECT * FROM coffee_profile WHERE user_id='".$_SESSION[user_id] ."'AND picnum='1';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$pic1 = $row['picture'];
	
	$sql = "SELECT * FROM coffee_profile WHERE user_id='".$_SESSION[user_id] ."'AND picnum='2';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$pic2 = $row['picture'];
	
	$sql = "SELECT * FROM coffee_profile WHERE user_id='".$_SESSION[user_id] ."'AND picnum='3';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$pic3 = $row['picture'];
	
	$sql = "SELECT * FROM coffee_profile WHERE user_id='".$_SESSION[user_id] ."'AND picnum='4';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$pic4 = $row['picture'];
	
	
	
	?>
	<div class="container">
	<div id="profile">
		<div id="pic">
		<?php
			
			echo '<img id="profPicture" class="main_image" src="'. IMAGE_PATH . $picture. '"/>';
		
		?>
		</div>
		<div id="info">
			<h1 id="name"><?php echo $name?></h1>
			<h3 id="location"><?php echo $city . ", " . $province;?></h3>
			<br>
			<h4 id="address">228 East 4th Ave</h4>
			<h4 id="email"><strong>Email:</strong> youremailhere@example.com</h4>
			<h4 id="phone"><strong>Phone:</strong><a href="tel:"> Call <?php echo $number;?></a></h4>
			<hr>
			<h4 id="hours"><strong>Hours of Operation</strong><br><br>Monday - Friday: 8am - 5pm<br>Saturday: 9am - 3pm<br>Sunday: Closed</h4>
			<hr>
			<h4 id="about"><strong>About<br><br></strong><?php echo $intro;?></h4>
			<hr>
			<h4 id="photos"><strong>Photos</strong></h4>
			<br>
			<?php
			echo '<img id="profPicture" class="collection" src="'. IMAGE_PATH . $pic1. '"/>';
			echo '<img id="profPicture" class="collection" src="'. IMAGE_PATH . $pic2. '"/>';
			echo '<img id="profPicture" class="collection" src="'. IMAGE_PATH . $pic3. '"/>';
			echo '<img id="profPicture" class="collection" src="'. IMAGE_PATH . $pic4. '"/>';
			?>
		</div>
	</div>
	</div>
	<?php
	

}
 require_once('footer.php');
?>
