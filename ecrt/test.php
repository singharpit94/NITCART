

<?php require_once("include/connection.php"); ?>
<?php include("include/function.php");
    $user=$_SESSION['user_id'];
   if(isset($_GET['q']))
   {
	   $qty=$_GET['q'];
	   $price=$_GET['p'];
	   $oid=$_GET['id'];
	  // echo $val;
	   //echo'</br>';
	  // echo $val1;
	   // echo'</br>';
	   //echo $val2;
	   $subtotal=$price*$qty;
		
		//$qty = (filter_var($qty, FILTER_VALIDATE_INT, array('min_range' => 0)) !== false) ? $qty : 1;
		
		;
		$sql2="UPDATE carts SET quantity='$qty',subtotal='$subtotal' where u_id='$user' AND id='$oid'";
		$result2=mysqli_query($dbc,$sql2);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "UPDATED NEW QTY";
		}
	   
   }
   if(isset($_GET['rmv']))
   {
	   $oid=$_GET['rmv'];
		$sql3 = "DELETE FROM carts WHERE id='$oid'";
		$result3=mysqli_query($dbc,$sql3);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "DELETED";
		}
   }
   ?>