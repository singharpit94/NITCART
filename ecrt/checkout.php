<?php require_once("include/connection.php"); ?>
<?php include("include/function.php"); ?>


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
<link rel="stylesheet" type="text/css" href="ship.css" />
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

<?php 
$user=$_SESSION['user_id'];
$shipping_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for Magic Quotes:
	if (get_magic_quotes_gpc()) {
		$_POST['first_name'] = stripslashes($_POST['first_name']);
		// Repeat for other variables that could be affected.
	}

	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['first_name'])) {
		$fn = addslashes($_POST['first_name']);
		
	} else {
		$shipping_errors['first_name'] = 'Please enter your first name!';
	}
	
	// Check for a last name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $_POST['last_name'])) {
		$ln  = addslashes($_POST['last_name']);
	} else {
		$shipping_errors['last_name'] = 'Please enter your last name!';
	}
	
	// Check for a street address:
	if (preg_match ('/^[A-Z0-9 \',.#-]{2,80}$/i', $_POST['address1'])) {
		$a1  = addslashes($_POST['address1']);
	} else {
		$shipping_errors['address1'] = 'Please enter your street address!';
	}
	
	// Check for a second street address:
	if (empty($_POST['address2'])) {
		$a2 = NULL;
	} elseif (preg_match ('/^[A-Z0-9 \',.#-]{2,80}$/i', $_POST['address2'])) {
		$a2 = addslashes($_POST['address2']);
	} else {
		$shipping_errors['address2'] = 'Please enter your street address!';
	}
	
	// Check for a city:
	if (preg_match ('/^[A-Z \'.-]{2,60}$/i', $_POST['city'])) {
		$c = addslashes($_POST['city']);
	} else {
		$shipping_errors['city'] = 'Please enter your city!';
	}
	
	// Check for a state:
	//if (preg_match ('/^[A-Z]{2}$/', $_POST['state'])) {
		$s = addslashes($_POST['state']);
	//} else {
		//$shipping_errors['state'] = 'Please enter your state!';
	//}
	
	// Check for a zip code:
	//if (preg_match ('/^(\d{5}$)|(^\d{5}-\d{4})$/', $_POST['zip'])) {
		$z = addslashes($_POST['zip']);
	//} else {
		//$shipping_errors['zip'] = 'Please enter your zip code!';
	//}
	
	// Check for a phone number:
	// Strip out spaces, hyphens, and parentheses:
	$phone = str_replace(array(' ', '-', '(', ')'), '', $_POST['phone']);
	if (preg_match ('/^[0-9]{10}$/', $phone)) {
		$p  = $phone;
	} else {
		$shipping_errors['phone'] = 'Please enter your phone number!';
	}
	if (isset($_POST['use']) && ($_POST['use'] == 'Y')) {
		$_SESSION['shipping_for_billing'] = true;
		$_SESSION['cc_first_name']  = $_POST['first_name'];
		$_SESSION['cc_last_name']  = $_POST['last_name'];
		$_SESSION['cc_address']  = $_POST['address1'] . ' ' . $_POST['address2'];
		$_SESSION['cc_city'] = $_POST['city'];
		$_SESSION['cc_state'] = $_POST['state'];
		$_SESSION['cc_zip'] = $_POST['zip'];
	}

	if (empty($shipping_errors)) { // If everything's OK...
	   $total=0;
	    $sql1="SELECT * FROM carts where u_id='$user'";
	$result1=mysqli_query($dbc,$sql1);
	while($row1=mysqli_fetch_assoc($result1))
	{
		$total=$total +$row1['subtotal'];
	}
	    $sql5="SELECT * FROM orders";
		$result5=mysqli_query($dbc,$sql5);
		$max=0;
		while($row5=mysqli_fetch_assoc($result5))
		{
			if($row5['id']>$max)
				$max=$row5['id'];
		}
		$max++;
		$_SESSION['order_id']=$max;
		$_SESSION['order_total']=$total;
	  $sql3="INSERT INTO orders (id,first_name,last_name,address1,address2,city,state,zip,phone,u_id,total)
                                      VALUES ('$max','$fn','$ln','$a1','$a2','$c','$s','$z','$p','$user','$total')";
		$result3=mysqli_query($dbc,$sql3);
		if (mysqli_affected_rows($dbc) == 1) {
			//echo "INSERTED";
			//echo "</br>";
			header("location:billing.php");
			
			
			
		}
		exit();
	//trigger_error('Your order could not be processed due to a system error. We apologize for the inconvenience.');	
	
	
	}
}


?>
<div class="cont">
<div class="container">
	<section id="content">

			
<form action="checkout.php" method="POST">
	<h1>Address</h1>
<?php // Need the form function:
include ('include/form_functions.inc.php');
?>
	<fieldset>
		<div class="field"><label for="use"><strong>Use Same Address for Billing?</strong></label><br /><input type="checkbox" name="use" value="Y" id="use" <?php if (isset($_POST['use'])) echo 'checked="checked" ';?>/></div>

	<div class="field"><label for="first_name"><strong>First Name* <span class="required"></span></strong></label><br /><?php create_form_input('first_name', 'text', $shipping_errors); ?></div>
	
	<div class="field"><label for="last_name"><strong>Last Name* <span class="required"></span></strong></label><br /><?php create_form_input('last_name', 'text', $shipping_errors); ?></div>
	
	<div class="field"><label for="address1"><strong>Street Address* <span class="required"></br><small>Line 1</small></span></strong></label><br /><?php create_form_input('address1', 'text', $shipping_errors); ?></div>
	
	<div class="field"><label for="address2"><strong>Street Address</strong></br><small>Line 2</small></label><br /><?php create_form_input('address2', 'text', $shipping_errors); ?></div>
	
	<div class="field"><label for="city"><strong>City* <span class="required"></span></strong></label><br /><?php create_form_input('city', 'text', $shipping_errors); ?></div>
	
	<div class="field"><label for="zip"><strong>Zip Code* <span class="required"></span></strong></label><br /><?php create_form_input('zip', 'text', $shipping_errors); ?></div>
	
	<div class="field"><label for="phone"><strong>Phone Number* <span class="required"></span></strong></label><br /><?php create_form_input('phone', 'text', $shipping_errors); ?></div>
	
	<div class="field"><label for="state"><strong>State* <span class="required"></span></strong> </label><br /><?php create_form_input('state', 'select', $shipping_errors); ?></div>
	
	
		<!-- form -->
		<div class="button">
			<div align="center"><input type="submit" value="Proceed" class="btn btn-danger btn-xs" /></div></fieldset></form>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</div>
</div>
















<!-- Footer  -->


<div class="foot" style="postion:fixed;bottom:0px;">
<nav class="navbar navbar-default">
  <div class="container">
     <div class="row">
    <div class="col-sm-3">
      <h5>Home</h5>
    </div>
    <div class="col-sm-3">
      <h5>Sign in</h5>
    </div>
    <div class="col-sm-3">
      <h5>Contact Us</h5>
    </div>
    <div class="col-sm-3">
      <h5>About Us</h5>
    </div>
    <p><center><small>&copy; 2012 www.myshop.com All rights reserved.</small></center></p>
    <p><center><small>Our website is best viewed on 1280X800 resolution.</small></center></p>
  </div>
</div>
</nav>
</div>
</div>


















</body>
</html>
	