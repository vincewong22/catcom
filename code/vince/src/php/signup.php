<link rel="stylesheet" href="../../css/signup.css">

<?php
//signup form
$legal ="Terms and Conditions:
By downloading a free legal document available on this website, you accept and agree to our terms and conditions.

The main terms of the licence incorporated into the terms and conditions are as follows.

Unless you have paid for the right to use the relevant document without a credit and hyperlink, you must: (a) retain the credit in the free legal document; and (b) if you publish the document on a website, include a link to www.seqlegal.com from your website.  The link can be pointed at any page on www.seqlegal.com.
Subject to this point, you may edit and amend the documents to render them suitable for your purposes.
You must not re-publish the free legal documents in unamended form. All footnotes and brackets should be removed from the documents before publication.
You must not sell or re-distribute the free legal documents or derivatives thereof.
We give no warranties or representations concerning the free legal documents, and accept no liability in relation to the use of the free legal documents.";

require_once('startsession.php');
require_once('appvars.php');
$page_title = ' Sign Up';
require_once('header.php');
require_once('navmenu.php');

//connect to database b/c need to verify if a username alredy exists
$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

//error messages
/* if($conn->connect_error)
	echo 'error conencting...';
else
	echo 'success connecting....'; */

if(isset($_POST['submit'])){

$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password1 = mysqli_real_escape_string($conn, trim($_POST['password1']));
$password2 = mysqli_real_escape_string($conn, trim($_POST['password2']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$profiletype = $_POST['profiletype'];

//echo'profile type = ' . $_POST['profiletype'];
//echo'profile type = ' . $_POST['email'];


if (!empty($username) && !empty($email)&& !empty($password1) && !empty($password2) && ($password1 == $password2)) {

// Make sure someone isn't already registered using this username
      $sql = "SELECT * FROM USER_TABLE WHERE username = '$username'";
	  $result = $conn->query($sql);
	  if($result->num_rows ==0){
	 
	 $sql = "INSERT INTO USER_TABLE (username,password,email,profiletype)
			VALUES ('$username',SHA('$password1'),'$email','$profiletype')";
			
	if($conn->query($sql)){
	echo '<br/>';
	echo 'Your new account has been successfully created';
	exit();
	}
	else
	echo 'failed to insert username';
	  }
	  else{
	  // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different username.</p>';
        $username = "";
	  }
}//end of password check
else{
	if($password1 != $password2)
		echo 'your passwords do not match';
	else
		echo '<h3 class="errormessage">You must enter all sign-up data!</h3>';
}
}//end of  submit

$conn->close;


?>
<div class="container">
	<form name="myform" data-toggle="validator" role="form" class="inline-form"method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<div class="form-group" >
			<label for="email" class="control-label">Email:</label>
			<input type="email" class="form-control"  name="email" value="<?php echo $email?>" data-error="Invalid email address format, example: cat@jobaccino.com" required/><br/>
			<div class="help-block with-errors"></div>
			</div>
			
  
			<div class="form-group">
			<label for="username" class="control-label">Username:</label>
			<input type="text" class="form-control" pattern="^[A-z0-9]{1,}$" data-minlength="6" name="username" value="<?php echo $username?>" data-error="Needs to be length of 6 with no symbols" required/><br/>
			<div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group">
			<label for="password1" class="control-label">Password:</label>
			<input type="password" class="form-control" data-minlength="6" name="password1" value="<?php echo $password1?>" data-error="Needs to be length of 6 with no symbols"/><br/>
			<div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group">
			<label for="password2" class="control-label">Confirm Password:</label>
			<input type="password" class="form-control" name="password2" data-minlength="6" value="<?php echo $password2?>" data-error="Needs to be length of 6 with no symbols"/><br/>
			<div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group">
			<label for="profiletype" class="control-label">Account type:</label>
			<label class="radio-inline">
			</div>
			
			
			
			<div class="form-group">
			<input type="radio" class="radio-inline" name="profiletype" value="normal" checked="checked"> Regular
				</label>
			<label class="radio-inline">
			<input type="radio" class="radio-inline" name="profiletype" value="barista"> Barista<br>
				</label>
			<label class="radio-inline">
				<input type="radio" class="radio-inline" name="profiletype" value="shop">Coffee Shop<br>
			</label>
			</div>
			
		<div class="form-group">
		<textarea class="form-control" placeholder="<?php echo "".$legal;?>"  readonly></textarea>
		</div>
		
		
		<div class="checkbox">
			<label><input type="checkbox" value="">I agree to terms and conditions</label>
		</div>
		
		<input type="submit" class="btn btn-default" value="Sign Up" name="submit"/>
		
	</form>
</div>

<?php
 require_once('footer.php');
?>