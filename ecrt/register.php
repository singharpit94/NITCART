<?php require_once("include/connection.php"); ?>
<?php include("include/function.php");?>

<html>

<head>
<title>REGISTER	</title>

<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/npm.js"></script>
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/social.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<style>

.shadow {
	position: absolute;
	margin: 250px;
	margin-top: 50px;
	margin-left: 60px;
	margin-right: 40%;
  -moz-box-shadow:    -5px 8px 20px 2px #000;
  -webkit-box-shadow: -5px 8px 20px 2px #000;
  box-shadow:         -5px 8px 20px 2px #000;
}
div.transbox
{
  background-color: #ffffff;
  opacity:0.6;
  filter:alpha(opacity=60); /* For IE8 and earlier */
}
div.transbox p
{
  margin: 4%;
  font-weight: bold;
  color: #000000;
}
.wid{
	width: 40%;
}
.shft{
	padding-top: 10px;
	padding-bottom: 10px;
}
.shftbtn{
	padding-left: 40%;
}
.inlyn{
	line-height: 1%;
}

.log{
	padding-left: 65%;
}
.logi{
	margin-left: 25px;
	margin-right: 140px;
	margin-bottom: 30px;
}
.hr{
	display: block;
    margin-top: 25%;
    margin-bottom: 0.5em;
    margin-left: -26;
    margin-right: -140;
    border-style: inset;
    border-width: 1px;
}
.social{
	margin-left: 50px;
	margin-right: -40px;

}
</style>

 </head>
<body>











<?php





// This is the registration page for the site.
// This file both displays and processes the registration form.
// This script is begun in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require_once ('include/connection.php');
//include("include/function.php");

// The config file also starts the session.

// Include the header file:
$page_title = 'Register';

 $tn=$_SESSION['product'];

// Require the database connection:
















 echo'<nav class="navbar navbar-inverse">';
   echo'<div class="container-fluid">';
    echo'<div class="navbar-header">';
    echo' <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
     echo'   <span class="sr-only">Toggle navigation</span>';
     echo'   <span class="icon-bar"></span>';
     echo'   <span class="icon-bar"></span>';
     echo'   <span class="icon-bar"></span>';
    echo'  </button>';
    echo'  <a class="navbar-brand" href="display.php">Shop Now  <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>';
   echo' </div> ';


          

   			//Category

	 foreach($tn as $key=>$nt)
	 {
		 $k=$nt;
		 echo'<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
 		echo'     <ul class="nav navbar-nav">';
		   echo"<li><a href=display.php?key=$k>".$k." <span class='sr-only'>(current)</span></a></li>";                         //category
		   echo"</ul>";
	 }
	 
	 


      echo '<ul class="nav navbar-nav navbar-right">';
        echo '<li><a href="#"><span class="glyphicon glyphicon-shopping-cart fa-1x" aria-hidden="true"></span></a></li>';
        echo '<li><a href="register.php"><span class=" glyphicon glyphicon-user fa-1x" aria-hidden="true"></span></a></li>';
      echo '</ul>';
      echo '<form class="navbar-form navbar-right" role="search">';
        echo '<div class="form-group">';
          echo '<input type="text" class="form-control" placeholder="Search">';
        echo '</div>';
        echo '<button type="submit" class="btn btn-default">Go</button>';
      echo '</form>';
      echo '</div>';
 echo ' </div>';
echo '</nav>';






























// For storing registration errors:
$reg_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['first_name'])) {
		$fn = mysqli_real_escape_string ($dbc, $_POST['first_name']);
	} else {
		$reg_errors['first_name'] = 'Please enter your first name!';
	}
	
	// Check for a last name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $_POST['last_name'])) {
		$ln = mysqli_real_escape_string ($dbc, $_POST['last_name']);
	} else {
		$reg_errors['last_name'] = 'Please enter your last name!';
	}
	
	// Check for a username:
	if (preg_match ('/^[A-Z0-9]{2,30}$/i', $_POST['username'])) {
		$u = mysqli_real_escape_string ($dbc, $_POST['username']);
	} else {
		$reg_errors['username'] = 'Please enter a desired name!';
	}
	
	// Check for an email address:
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
	} else {
		$reg_errors['email'] = 'Please enter a valid email address!';
	}

	// Check for a password and match against the confirmed password:
	if (preg_match ('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $_POST['pass1']) ) {
		if ($_POST['pass1'] == $_POST['pass2']) {
			$p = mysqli_real_escape_string ($dbc, $_POST['pass1']);
		} else {
			$reg_errors['pass2'] = 'Your password did not match the confirmed password!';
		}
	} else {
		$reg_errors['pass1'] = 'Please enter a valid password!';
	}
	
	if (empty($reg_errors)) { // If everything's OK...

		// Make sure the email address and username are available:
		$q = "SELECT email, username FROM users WHERE email='$e' OR username='$u'";
		$r = mysqli_query ($dbc, $q);
		
		// Get the number of rows returned:
		$rows = mysqli_num_rows($r);
		
		if ($rows == 0) { // No problems!
			
			// Add the user to the database...
			
			// Temporary: set expiration to a month!
			// Change after adding PayPal!
			//$q = "INSERT INTO users (username, email, pass, first_name, last_name, date_expires) VALUES ('$u', '$e', '"  .  get_password_hash($p) .  "', '$fn', '$ln', ADDDATE(NOW(), INTERVAL 1 MONTH) )";
			
			// New query, updated in Chapter 6 for PayPal integration:
			// Sets expiration to yesterday:
			$q = "INSERT INTO users (username, email, pass, first_name, last_name, date_expires) VALUES ('$u', '$e', '"  .  get_password_hash($p) .  "', '$fn', '$ln', SUBDATE(NOW(), INTERVAL 1 DAY) )";
			
			$r = mysqli_query ($dbc, $q);

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
							
				// Get the user ID:
				// Store the new user ID in the session:
				// Added in Chapter 6:
				$uid = mysqli_insert_id($dbc);
//				$_SESSION['reg_user_id']  = $uid;		
				
				// Display a thanks message:
				
				// Original message from Chapter 4:
				echo '<h3>Thanks!</h3><p>Thank you for registering! You may now log in and access the site\'s content.</p>';
				
				// Updated message from Chapter 6:
				//echo "<h3>Thanks!</h3><p>Thank you for registering! To complete the process, please now click the button below so that you may pay for your site access via PayPal. The cost is $10 (US) per year.</p>";

				// PayPal link added in Chapter 6:
				echo '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="custom" value="' . $uid . '">
				<input type="hidden" name="email" value="' . $e . '">
				<input type="hidden" name="hosted_button_id" value="8YW8FZDELF296">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				';
						
				// Send a separate email?
				$body = "Thank you for registering at <whatever site>. Blah. Blah. Blah.\n\n";
				mail($_POST['email'], 'Registration Confirmation', $body, 'From: admin@example.com');
				
				// Finish the page:
				//include ('./includes/footer.html'); // Include the HTML footer.
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			}
			
		} else { // The email address or username is not available.
			
			if ($rows == 2) { // Both are taken.
				
				$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';			
				$reg_errors['username'] = 'This username has already been registered. Please try another.';			

			} else { // One or both may be taken.

				// Get row:
				$row = mysqli_fetch_array($r, MYSQLI_NUM);
									
				if( ($row[0] == $_POST['email']) && ($row[1] == $_POST['username'])) { // Both match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';	
					$reg_errors['username'] = 'This username has already been registered with this email address. If you have forgotten your password, use the link at right to have your password sent to you.';
				} elseif ($row[0] == $_POST['email']) { // Email match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';						
				} elseif ($row[1] == $_POST['username']) { // Username match.
					$reg_errors['username'] = 'This username has already been registered. Please try another.';			
				}
					
			} // End of $rows == 2 ELSE.
			
		} // End of $rows == 0 IF.
		
	} // End of empty($reg_errors) IF.

} // End of the main form submission conditional.

// Need the form functions script, which defines create_form_input():
require ('include/form_functions.inc.php');
?>

















    



<div class="shadow">
<div class="transbox">
<form action="register.php" method="post" accept-charset="utf-8" style="padding-left:100px">
<div class="shft">
<h2><b>Register</b></h2>
<div class="inlyn"><p>Do Register... It's Free...<strong></p><p><font color="red">*Note: All fields are mandatory</font></p></div>
<div class="form-group">
		<p><label for="first_name"><strong>First Name</strong></label><br /><?php create_form_input('first_name', 'text', $reg_errors); ?></p>
		


		<p><label for="last_name"><strong>Last Name</strong></label><br /><?php create_form_input('last_name', 'text', $reg_errors); ?></p>
		
		<p><label for="username"><strong>Desired Username</strong></label><br /><?php create_form_input('username', 'text', $reg_errors); ?> <small>Only letters and numbers are allowed.</small></p>
		
		<p><label for="email"><strong>Email Address</strong></label><br /><?php create_form_input('email', 'text', $reg_errors); ?></p>
		
		<p><label for="pass1"><strong>Password</strong></label><br /><?php create_form_input('pass1', 'password', $reg_errors); ?> <small>Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small></p>
		<p><label for="pass2"><strong>Confirm Password</strong></label><br /><?php create_form_input('pass2', 'password', $reg_errors); ?></p>
			<div class="shftbtn">
		<input type="submit" name="submit_button" value="Submit" id="submit_button" class="formbutton" />
		</div>
	</div>
	</div>
</form>
</div>
</div>






<div class="log">
	<div class="shadow">
<div class="transbox">
	<div class="logi">
<?php

// This script displays the login form.
// This script is included by footer.html, if the user isn't logged in.
// This script is created in Chapter 4.

// Create an empty error array if it doesn't already exist:
if (!isset($login_errors)) $login_errors = array();

// Need the form functions script, which defines create_form_input():
// The file may already have been included (e.g., if this is register.php or forgot_password.php).?><div class="title">
	<p><h2>Login</h2></p>
</div>
<form action="display.php" method="post" accept-charset="utf-8">
<p><?php if (array_key_exists('login', $login_errors)) {
	echo '<span class="error">' . $login_errors['login'] . '</span><br />';
	}?><label for="email"><strong>Email Address</strong></label><br /><?php create_form_input('email', 'text', $login_errors); ?><br /><label for="pass"><strong>Password</strong></label><br /><?php create_form_input('pass', 'password', $login_errors); ?> <a href="forgot_password.php" align="right">Forgot?</a><br /><input type="submit" value="Login &rarr;"></p>
</form>
<div class="hr"></div>



<div class="social">
	<a class="btn btn-block btn-social btn-facebook">
    <i class="fa fa-facebook fa-1x"></i> <b> | Connect with Facebook</b>
  </a>
<a class="btn btn-block btn-social btn-google-plus">
    <i class="fa fa-google-plus fa-1x"></i> <b> | Connect with Google</b>
  </a>

</div>





</div>
</div>
</div>
</div>





</body>
</html>