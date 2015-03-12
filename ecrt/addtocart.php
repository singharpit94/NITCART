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
	if($row1>0)
	{    echo "Arpit";
         $newqty=$row1['quantity']+1;
		 //echo $newqty;
		 $subtotal=$newqty*$row['price'];
		$sql2="UPDATE carts SET quantity='$newqty',subtotal='$subtotal' where u_id='$user' AND product_id='$pid'";
		$result2=mysqli_query($dbc,$sql2);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "UPDATED";
		}
	}
	else 
	{   //echo "Singh";
          $subtotal=$row['price'];
		$sql3="INSERT INTO carts (quantity,u_id,product_type,product_id,subtotal)
                                      VALUES (1, '$user','$table','$pid','$subtotal')";
		$result3=mysqli_query($dbc,$sql3);
		if (mysqli_affected_rows($dbc) == 1) {
			echo "INSERTED";
		}
		

	}
   }
   ?>