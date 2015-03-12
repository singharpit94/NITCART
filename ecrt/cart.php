<?php require_once("include/connection.php"); ?>
<?php include("include/function.php");

    $cart_errors=array();
    
   $user=$_SESSION['user_id'];
   
   if(isset($_GET['zid'])&&isset($_GET['zt']))
   {
   $pid=$_GET['zid'];
   $table=$_GET['zt'];
    $sql="SELECT * FROM $table where id ='$pid'";
	$result = mysqli_query($dbc,$sql);
		if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
		}
		$row=mysqli_fetch_assoc($result);
	$sql1="SELECT * FROM carts where u_id='$user' AND product_id='$pid'";
	$result1=mysqli_query($dbc,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	if($row1>0&&!isset($_GET['uqty'])&&!isset($_GET['rmv']))
	{    //echo "Arpit";
         $newqty=$row1['quantity']+1;
		 //echo $newqty;
		 $subtotal=$newqty*$row['price'];
		$sql2="UPDATE carts SET quantity='$newqty',subtotal='$subtotal' where u_id='$user' AND product_id='$pid'";
		$result2=mysqli_query($dbc,$sql2);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "UPDATED";
		}
	}
	else if (!isset($_GET['uqty'])&&!isset($_GET['rmv']))
	{   //echo "Singh";
          $subtotal=$row['price'];
		$sql3="INSERT INTO carts (quantity,u_id,product_type,product_id,subtotal)
                                      VALUES (1, '$user','$table','$pid','$subtotal')";
		$result3=mysqli_query($dbc,$sql3);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "INSERTED";
		}
		

	}
	
	else if(isset($_GET['uqty']))
	{
		$qty=$_POST['nqty'];
		$subtotal=$qty*$row['price'];
		//$qty = (filter_var($qty, FILTER_VALIDATE_INT, array('min_range' => 0)) !== false) ? $qty : 1;
		if($qty>0)
		{$oid=$_GET['uqty'];
		$sql2="UPDATE carts SET quantity='$qty',subtotal='$subtotal' where u_id='$user' AND id='$oid'";
		$result2=mysqli_query($dbc,$sql2);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "UPDATED NEW QTY";
		}
		}
		else{
		$cart_errors['qty']="PLEASE ENTER A POSITIVE VALUE";
		}
	}
	else if(isset($_GET['rmv']))
	{
		$oid=$_GET['rmv'];
		$sql3 = "DELETE FROM carts WHERE id='$oid'";
		$result3=mysqli_query($dbc,$sql3);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "DELETED";
		}
	}
	
   }
		$sql6="SELECT * FROM carts where u_id='$user'";
	$result6=mysqli_query($dbc,$sql6);
	//echo "Sammita";
	while ($row6 = mysqli_fetch_assoc($result6)){
	
	        $i=$row6['id'];
			$pid1=$row6['product_id'];
			$tid1=$row6['product_type'];
			 //if (array_key_exists('login', $login_errors)) {
	//echo '<span class="error">' . $login_errors['login'] . '</span><br />';
	//}
	         echo "<form name='X' action='cart.php?uqty=$i&&zid=$pid1&&zt=$tid1' method='POST'>";
			 if (array_key_exists('qty', $cart_errors)) {
	echo '<span class="error">' . $cart_errors['qty'] . '</span><br />';
	}
             echo "<input type='number' name='nqty'>";
            echo " <input type='submit'>";
			
           echo " </form>";
		
    
	echo "<a href=cart.php?rmv=$i&&zid=$pid1&&zt=$tid1>REMOVE FROM CART</a>";
	}
	
	echo "<a href=checkout.php>CHECKOUT</a>";
	?>
    