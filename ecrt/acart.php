<html>
<head>
<title>CART</title>
<meta name="viewport" content="width=device-width , initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/npm.js"></script>
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/social.css">
    <style>
          .cont{
      padding-top: 4%;
    }

    .foot{
      width: 100%;
    }
    .overflow{
      overflow-x: hidden;
    }
    .crt{
      margin-left: 7.5%;
      margin-right: 7.5%;
    }
    .hr{

      margin-left: 7.5%;
      margin-right: 7.5%;
  display: block;
    border-style: inset;
    border-width: 1px;
}
.shift{
  padding-left: 75%;
}
.shiftp{
  padding-left: 65%;
}
.wid{
  width: 30px;
}
    </style>







</head>
<body>



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
			//echo "UPDATED";
		}
	}
	else 
	{   //echo "Singh";
          $subtotal=$row['price'];
		$sql3="INSERT INTO carts (quantity,u_id,product_type,product_id,subtotal)
                                      VALUES (1, '$user','$table','$pid','$subtotal')";
		$result3=mysqli_query($dbc,$sql3);
		if (mysqli_affected_rows($dbc) == 1) {
			//echo "INSERTED";
		}
		

	}
   }
   
   
   
   echo '<div class="overflow">';
   echo '<div class="cont">';



    echo '<div class="crt">';
    echo'<ul class="nav nav-tabs">';
  echo "<li class='active'><a href=#>&nbsp;&nbsp;<span class='glyphicon glyphicon-shopping-cart fa-1x' aria-hidden='true'></span> &nbsp;&nbsp;<strong>Cart&nbsp;&nbsp;</strong></a></li>";
    echo '</ul>';
    echo '</div>';






      $sql6="SELECT * FROM carts where u_id='$user'";
	$result6=mysqli_query($dbc,$sql6);

$total=0;
            

    echo'<div class="container">';
      echo '<h2> <span class="glyphicon glyphicon-heart-empty"></span> Your Wish List</h2>';  
     echo' <div class="shift">';
     echo" <a href=display.php?key=Mobiles class='btn btn-primary' role='button'>Add More to Cart</a>";
     echo" <a href=checkout.php?key=Mobiles class='btn btn-warning' role='button'>Proceed to Pay </a>";
     echo ' </div> ';                                                                                 
     echo '<div class="table-responsive">';          
    echo  '<table class="table" id="table">';
      echo  '<thead>';
       echo '<tr>';
            echo'<th>Item Name</th>';
           echo' <th>Quantity</th>';
           echo' <th>Price</th>';
           echo ' <th>Sub Total</th>';
            echo '<th></th>';
         echo' </tr>';
        echo '</thead>';
        echo '<tbody>';
   
  
	//echo "Sammita";
	$j=1;
	while ($row6 = mysqli_fetch_assoc($result6)){
	   
	        $i=$row6['id'];
			$pid1=$row6['product_id'];
			$tid1=$row6['product_type'];
			$qty=$row6['quantity'];
			$sql7="SELECT * FROM $tid1 where id='$pid1'";
			$result7=mysqli_query($dbc,$sql7);
			$row7=mysqli_fetch_assoc($result7);
			$price=$row7['price'];
			$total=$total+$row6['subtotal'];
			
			 //if (array_key_exists('login', $login_errors)) {
	//echo '<span class="error">' . $login_errors['login'] . '</span><br />';
	//}
	        /* echo "<form name='X' action='cart.php?uqty=$i&&zid=$pid1&&zt=$tid1' method='POST'>";
			 if (array_key_exists('qty', $cart_errors)) {
	echo '<span class="error">' . $cart_errors['qty'] . '</span><br />';
	}
             echo "<input type='number' name='nqty'>";
            echo " <input type='submit'>";
			
           echo " </form>";
		
    
	echo "<a href=cart.php?rmv=$i&&zid=$pid1&&zt=$tid1>REMOVE FROM CART</a>";*/
	
	echo'<tr>';
            echo'<td><img src="'.$row7['image'].'" height="40" width="20"><strong> &nbsp;&nbsp;'.$row7['name'].'</strong></td>';
            
			 echo '<td><strong><input id="numb'.$j.'" type="number" value='.$qty.'><button type="button" onclick="myFunction('.$row6['id'].','.$price.','.$j.')">Submit</button></strong></td>';
            echo '<td><strong>'.$price.'</strong></td>';
           echo '<td><strong><div id="demo'.$j.'">'.$row6['subtotal'].'</div></strong></td>';
            echo '<td><input type="button" class="btn btn-danger btn-xs" value="X" onclick="deleteRow(this,'.$row6['id'].')"></td>';
          echo '</tr>';
		  echo '<div =id="ff">s</div>';
	
	
	$j++;
	}
	 echo '</tbody>';
     echo' </table>';
     echo ' </div>';
    echo '</div>';




echo '<div class="hr"></div>';
echo '<div class="shiftp">';
echo '<h4><b>Total Price :</b><strong><div id ="tt">'.$total.'</div></strong></h4>';
 echo '</div>';
	
	//echo "<a href=checkout.php>CHECKOUT</a>";
	?>
	<script>
function myFunction(id,price,k) {
    var x;
	var id1=id;
    var text;
    var y=price;
    var z;
	var tot;
	var l;
	
	tot=document.getElementById("tt").value;
	tot=parseInt(tot);
	l=document.getElementById("demo"+k).value;
	l=parseInt(l);
	tot=tot-l;
    // Get the value of the input field with id="numb"
    x = document.getElementById("numb"+k).value;
     x=parseInt(x);
    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 1) {
      text="Invalid Input";
    document.getElementById("demo"+k).innerHTML = text;
    } else {
        z=Number(x)*y ;
		tot=tot+z;
    document.getElementById("demo"+k).innerHTML = z;
	document.getElementById("tt").innerHTML = tot;
	 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     // document.getElementById("tt").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","test.php?q="+x+"&p="+y+"&id="+id1,true);
  xmlhttp.send();
	
}
 
	
    }





function deleteRow(r,id) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("table").deleteRow(i);
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("tt").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","test.php?rmv="+id,true);
  xmlhttp.send();
	
}

</script>







</body>
</html>
    