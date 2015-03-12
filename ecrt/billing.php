<?php require_once("include/connection.php"); ?>
<?php include("include/function.php");

$user=$_SESSION['user_id'];
$billing_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (get_magic_quotes_gpc()) {
		$_POST['cc_first_name'] = stripslashes($_POST['cc_first_name']);
		// Repeat for other variables that could be affected.
	}

	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['cc_first_name'])) {
		$cc_first_name = $_POST['cc_first_name'];
		 
	} else {
		$billing_errors['cc_first_name'] = 'Please enter your first name!';
	}
	
	// Check for a last name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $_POST['cc_last_name'])) {
		$cc_last_name  = $_POST['cc_last_name'];
	} else {
		$billing_errors['cc_last_name'] = 'Please enter your last name!';
	}
	
	// Check for a valid credit card number...
	// Strip out spaces or hyphens:
	$cc_number = str_replace(array(' ', '-'), '', $_POST['cc_number']);
	
	// Validate the card number against allowed types:
	if (!preg_match ('/^4[0-9]{12}(?:[0-9]{3})?$/', $cc_number) // Visa
	&& !preg_match ('/^5[1-5][0-9]{14}$/', $cc_number) // MasterCard
	&& !preg_match ('/^3[47][0-9]{13}$/', $cc_number) // American Express
	&& !preg_match ('/^6(?:011|5[0-9]{2})[0-9]{12}$/', $cc_number) // Discover
	) {
		$billing_errors['cc_number'] = 'Please enter your credit card number!';
	}
	
	// Check for an expiration date:
	if ( ($_POST['cc_exp_month'] < 1 || $_POST['cc_exp_month'] > 12)) {
		$billing_errors['cc_exp_month'] = 'Please enter your expiration month!';		
	}
	
	if ($_POST['cc_exp_year'] < date('Y')) {
		$billing_errors['cc_exp_year'] = 'Please enter your expiration year!';
	}
	
	// Check for a CVV:
	if (preg_match ('/^[0-9]{3,4}$/', $_POST['cc_cvv'])) {
		$cc_cvv = $_POST['cc_cvv'];
	} else {
		$billing_errors['cc_cvv'] = 'Please enter your CVV!';
	}
	
	// Check for a street address:
	if (preg_match ('/^[A-Z0-9 \',.#-]{2,160}$/i', $_POST['cc_address'])) {
		$cc_address  = $_POST['cc_address'];
	} else {
		$billing_errors['cc_address'] = 'Please enter your street address!';
	}
		
	// Check for a city:
	if (preg_match ('/^[A-Z \'.-]{2,60}$/i', $_POST['cc_city'])) {
		$cc_city = $_POST['cc_city'];
	} else {
		$billing_errors['cc_city'] = 'Please enter your city!';
	}
	
	// Check for a state:
	if (preg_match ('/^[A-Z]{2}$/', $_POST['cc_state'])) {
		$cc_state =$_POST['cc_state'];
	} else {
		$billing_errors['cc_state'] = 'Please enter your state!';
	}
	
	// Check for a zip code:
	if (preg_match ('/^(\d{5}$)|(^\d{5}-\d{4})$/', $_POST['cc_zip'])) {
		$cc_zip = $_POST['cc_zip'];
	} else {
		$billing_errors['cc_zip'] = 'Please enter your zip code!';
	}
	
   if (empty($billing_errors)) { // If everything's OK...

		// Convert the expiration date to the right format:
		$cc_exp = sprintf('%02d%d', $_POST['cc_exp_month'], $_POST['cc_exp_year']);
		if (isset($_SESSION['order_id'])) { // Use existing order info:
			$order_id = $_SESSION['order_id'];
			$order_total = $_SESSION['order_total'];
			//echo "Arpit";
			// Get the last four digits of the credit card number:
			$cc_last_four = substr($cc_number, -4);
			//echo $cc_last_four;
			//echo $order_id;
			//echo $order_total;
			$sql3="INSERT INTO billing (first_name,last_name,address1,city,state,zip,u_id,order_id,card_no,amount)
                                     VALUES  ('$cc_first_name','$cc_last_name','$cc_address','$cc_city','$cc_state','$cc_zip','$user','$order_id','$cc_last_four','$order_total')";
		$result3=mysqli_query($dbc,$sql3);
		if (mysqli_affected_rows($dbc) == 1) {
			//echo "INSERTED BILLING ";
			$_SESSION['order_total'] = $order_total;
			$_SESSION['order_id'] = $order_id;
			$customer_id = $_SESSION['user_id'];
			require_once('include/gateway_setup.php');
		     require_once('include/gateway_process.php');
			header("location:index.php");
		}
		
		else
		{
			echo "ERROR";
		}
			
		
}
   }

}
?>

<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title></title>

 <meta name="viewport" content="width=device-width , initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/npm.js"></script>
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/social.css">
<link rel="stylesheet" type="text/css" href="css/ship.css" />
<style type>
          .cont{
      padding-top: 4%;
    }

    .foot{
      width: 100%;
    }
    .overflow{
      overflow-x: hidden;
    }
</style>
</head>
<body>
	<div class="overflow">
		<div class="cont">
<div class="container">
  <div class="jumbotron">
			<h1><strong>Your Billing Information</strong></h1>
			</br>
			<p><font color ="red"><small>For your security, we will not store your billing information in any way. </br>We accept Visa, MasterCard, American Express, and Discover.</small></font></p>
</div>
<?php if (isset($message)) echo "<p class=\"error\">$message</p>"; ?>			
<form action="billing.php" method="POST" id="billing_form">
<?php // Need the form function:
include ('include/form_functions.inc.php');
?>
	<fieldset>

		<div class="field"><label for="cc_number"><strong>Card Number</strong></label><br /><?php create_form_input('cc_number', 'text', $billing_errors, 'POST', 'autocomplete="off"'); ?></div>

		<div class="field"><label for="exp_date"><strong>Expiration Date</strong></label><br /><?php create_form_input('cc_exp_month', 'select', $billing_errors); ?><?php create_form_input('cc_exp_year', 'select', $billing_errors); ?></div>

		<div class="field"><label for="cc_cvv"><strong>CVV</strong></label><br /><?php create_form_input('cc_cvv', 'text', $billing_errors, 'POST', 'autocomplete="off"'); ?></div>

	<div class="field"><label for="cc_first_name"><strong>First Name </strong></label><br /><?php create_form_input('cc_first_name', 'text', $billing_errors); ?></div>
	
	<div class="field"><label for="cc_last_name"><strong>Last Name </strong></label><br /><?php create_form_input('cc_last_name', 'text', $billing_errors); ?></div>
	
	<div class="field"><label for="cc_address"><strong>Street Address </strong></label><br /><?php create_form_input('cc_address', 'text', $billing_errors); ?></div>
	
	<div class="field"><label for="cc_city"><strong>City </strong></label><br /><?php create_form_input('cc_city', 'text', $billing_errors); ?></div>
	
	<div class="field"><label for="cc_state"><strong>State </strong></label><br /><?php create_form_input('cc_state', 'select', $billing_errors); ?></div>
	
	<div class="field"><label for="cc_zip"><strong>Zip Code </strong></label><br /><?php create_form_input('cc_zip', 'text', $billing_errors); ?></div>
		
	<br clear="all" />
	
<div align="center" id="submit_div"><input type="submit" value="Place Order" class="btn btn-primary btn" /></div></fieldset></form></div>
</div>
      </div>
   </div>
   <div class="left-bot-corner">
   	<div class="right-bot-corner">
      	<div class="border-bot"></div>
      </div>
   </div>
</div>
			
		