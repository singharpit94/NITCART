<?php require_once("include/connection.php"); ?>
<?php include("include/function.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('login.inc.php');
}?>
<html>

<head>
<title>MY ECOMMERCE	</title>

     

    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/npm.js"></script>
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/social.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
    .items{
      padding-left: 200px;
      padding-top: 20px;
      z-index: -20;
    }

    .foot{
      width: 100%;
    }
    .overflow{
      overflow-x: hidden;
    }
    .panl{
      width: 150px;
      position: absolute;
      padding-top: 20px;
      z-index: 20;

    }
        .filt{
      width: 150px;
      padding-top: 250px;
      position: absolute;
    }

   .btn-xlarge {
    padding: 15px 50px;
    font-size: 14px;
    line-height: normal;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
    }
   .btn-xxlarge {
    padding: 15px 65px;
    font-size: 14px;
    line-height: normal;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
    }
	.foot{
      width: 100%;
      padding-top: 100%;
    }

    </style>






</head>
<body>

<!--control overflow along y axis -->
 
<div class="overflow">


<?php
   
   
     $tn=$_SESSION['product'];
	 if(isset($_GET['skey'])){
		 $vh=$_GET['skey'];
		// echo $vh;
	 }
	 
	 



//Header

    echo'<nav class="navbar navbar-inverse">';
   echo'<div class="container-fluid">';
    echo'<div class="navbar-header">';
    echo' <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
     echo'   <span class="sr-only">Toggle navigation</span>';
     echo'   <span class="icon-bar"></span>';
     echo'   <span class="icon-bar"></span>';
     echo'   <span class="icon-bar"></span>';
    echo'  </button>';
    echo'  <a class="navbar-brand" href="index.php">Shop Now  <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>';
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
	  if(isset($_SESSION['user_id']))
	  { echo "<li><a href=acart.php><span class='glyphicon glyphicon-shopping-cart fa-1x' aria-hidden=true></span></a></li>";}
  else
	  echo "<li><a href=register.php><span class='glyphicon glyphicon-shopping-cart fa-1x' aria-hidden=true></span></a></li>";
		if(isset($_SESSION['username'])){
			$username=$_SESSION['username'];
			 echo "<li><a href=#>".$username."</a></li>";
			 echo "<li><a href=logout.php>Log Out</a></li>";
		}
		else
		{
        echo "<li><a href=register.php>Sign in</a></li>";
        echo "<li><a href=register.php>Sign up</a></li>";
		}
      echo '</ul>';
      echo "<form action=second.php class='navbar-form navbar-right' role='search'>";
        echo '<div class="form-group">';
          echo '<input type="text"  name= "skey" class="form-control" placeholder="Search">';
        echo '</div>';
        echo '<button type="submit" class="btn btn-default">Go</button>';
      echo '</form>';
      echo '</div>';
 echo ' </div>';
echo '</nav>';






















	 
 if(isset($_GET['key'])){
	 
	 
	 $val=$_GET['key'];
	 $sql3="SELECT DISTINCT company FROM $val";
	 $result3 = mysqli_query($dbc,$sql3);

if (mysqli_num_rows($result3) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

echo '<div class="panl">';
echo  '<h4><b><center>Brand</center></b></h4>';
echo '<div class="btn-group-vertical" role="group" aria-label="Vertical button group">';



while ($row3 = mysqli_fetch_assoc($result3)){
	       $k1=$row3["company"];
		   echo"<a href=display.php?key1=$k1&&key=$val class='btn btn-xlarge btn-default'>".$k1."</a></button>";            //brand
	
}
echo "</div>";
echo'</div>';
//$cn=$_SESSION["company"];
	// echo $val;
	 /*foreach($cn as $key1=>$nt)
	 {
		 $k1=$nt;
		 echo"<ul>";
		   echo"<li ><a href=display.php?key1=$k1&&key=$val >".$k1."</a></li>";
		   echo"</ul>";
	 }*/
	 if(!isset($_GET['key1'])){
	 $sql="SELECT * FROM $val ";
$result = mysqli_query($dbc,$sql);


$ctr=5;



echo '<div class="filt">';
echo  '<h4><b><center>Price</center></b></h4>';
echo '<div class="btn-group-vertical" role="group" aria-label="Vertical button group">';




while($ctr>0)
{
        $ztr=$ctr*10;
        $xtr=$ztr*2;
		   echo"<a href=display.php?key=$val&&key3=$ctr class='btn btn-xxlarge btn-default'>".$ztr."-".$xtr."</a></button>";               //filter
		   
		   $ctr--;
}
echo'</div>';
echo "</div>";




    if(!isset($_GET['key3'])){
if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
    echo '<div class="items">';
   echo '<div class="container">';
  echo '<div class="row">';
while ($row = mysqli_fetch_assoc($result)) {

	$t_id=$row['id'];
  echo '<div class="col-sm-6 col-md-3">';
    echo '<div class="thumbnail">';
     echo ' <img src="'.$row['image'].'" alt="Xperia ZR" height="70" width="50">';
      echo '<div class="caption">';
       echo " <h3><center>".$row['name']."</center></h3>";
        echo "<p><center>&#8377 ".$row['price']."</center></p";
		 if(isset($_SESSION['user_id']))
       echo "<p><center><a href=acart.php?zt=$val&&zid=$t_id class='btn btn-primary' role='button'>Buy</a> <a href=acart.php?zt=$val&&zid=$t_id class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";
        else
		echo "<p><center><a href=register.php class='btn btn-primary' role='button'>Buy</a> <a href=register.php class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";	
     echo ' </div>';
    echo '</div>';
   echo '</div>';
 
	
	
	
	
	//echo $row["name"];
	//$b= $row["image"];
	//echo '<img src="'. $row['image'].'" />';
}
 echo '</div>';
    echo '</div>';
    echo '</div>';
	}
	if(isset($_GET['key3']))
	{
		$val4=$_GET['key3'];
		
		$val4=$val4*10;
		$val5=$val4 +10;
		 //echo $val4;
		$sql4="SELECT * FROM $val where price BETWEEN '$val4' AND '$val5'";
		$result4 = mysqli_query($dbc,$sql4);
		if (mysqli_num_rows($result4) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
    echo '<div class="items">';
   echo '<div class="container">';
echo '<div class="row">';
while ($row4 = mysqli_fetch_assoc($result4)) {

      $t_id=$row4['id'];
     echo '<div class="col-sm-6 col-md-3">';
    echo '<div class="thumbnail">';
     echo ' <img src="'.$row4['image'].'" height="70" width="50">';
      echo '<div class="caption">';
       echo " <h3><center>".$row4['name']."</center></h3>";
        echo "<p><center>&#8377 ".$row['price']."</center></p";
         if(isset($_SESSION['user_id']))
       echo "<p><center><a href=acart.php?zt=$val&&zid=$t_id class='btn btn-primary' role='button'>Buy</a> <a href=acart.php?zt=$val&&zid=$t_id class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";
        else
		echo "<p><center><a href=register.php class='btn btn-primary' role='button'>Buy</a> <a href=register.php class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";
     echo ' </div>';
    echo '</div>';
  echo '</div>';

	//echo $row4["name"];
	//echo '<img src="'. $row4['image'].'" />';
}
		
    echo '</div>';
  echo '</div>';

    echo '</div>';		
	}
	 }






//------------------------------------------------------------------------------------------------//

	 



	 if(isset($_GET['key1'])){
		// echo $val;
		$val1=$_GET['key1'];
		 $ctr=5;
		echo '<div class="filt">';
echo  '<h4><b><center>Price</center></b></h4>';
echo '<div class="btn-group-vertical" role="group" aria-label="Vertical button group">';




while($ctr>0)
{
          $ztr=$ctr*10;
          $xtr=$ztr*2;

       echo"<a href=display.php?key=$val&&key3=$ctr&&key1=$val1 class='btn btn-xxlarge btn-default' >".$ztr."-".$xtr."</a></button>";               //filter
       
       $ctr--;
}
echo'</div>';
echo "</div>";
    if(!isset($_GET['key3'])){





$sql1="SELECT * FROM $val WHERE company = '$val1' ";
   $result1 = mysqli_query($dbc,$sql1);

if (mysqli_num_rows($result1) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
echo '<div class="items">';
   echo '<div class="container">';
      echo '<div class="row">';
while ($row1 = mysqli_fetch_assoc($result1)) {
    
  
  $t_id=$row1['id'];
  echo '<div class="col-sm-6 col-md-3">';
    echo '<div class="thumbnail">';
     echo ' <img src="'.$row1['image'].'" alt="Xperia ZR" height="70" width="50">';
      echo '<div class="caption">';
       echo " <h3><center>".$row1['name']."</center></h3>";
       echo "<p><center>&#8377 ".$row['price']."</center></p";
         if(isset($_SESSION['user_id']))
        echo "<p><center><a href=acart.php?zt=$val&&zid=$t_id class='btn btn-primary' role='button'>Buy</a> <a href=acart.php?zt=$val&&zid=$t_id class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";
        else
		echo "<p><center><a href=register.php class='btn btn-primary' role='button'>Buy</a> <a href=register.php class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";
     echo ' </div>';
    echo '</div>';
  echo '</div>';
  
  
  
  
  
  //echo $row["name"];
  //$b= $row["image"];
  //echo '<img src="'. $row['image'].'" />';
}
echo '</div>';
echo '</div>';
    echo '</div>';
  }














//------------------------------------------------------------------------------------------//




  if(isset($_GET['key3']))
  {
   $val5=$_GET['key3'];
    
    $val5=$val5*10;
    $val6=$val5 +10;
     //echo $val5;
    $sql5="SELECT * FROM $val where company='$val1' AND price BETWEEN '$val5' AND '$val6'";
    $result5 = mysqli_query($dbc,$sql5);
    if (mysqli_num_rows($result5) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
echo '<div class="items">';
echo '<div class="container">';
echo '<div class="row">';
while ($row5 = mysqli_fetch_assoc($result5)) {

  $t_id=$row5['id'];
     echo '<div class="col-sm-6 col-md-3">';
    echo '<div class="thumbnail">';
     echo ' <img src="'.$row5['image'].'" alt="Xperia ZR" height="70" width="50">';
      echo '<div class="caption">';
       echo " <h3><center>".$row5['name']."</center></h3>";
        echo "<p><center>&#8377 ".$row['price']."</center></p";
        if(isset($_SESSION['user_id']))
       echo "<p><center><a href=acart.php?zt=$val&&zid=$t_id class='btn btn-primary' role='button'>Buy</a> <a href=acart.php?zt=$val&&zid=$t_id class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";
        else
		echo "<p><center><a href=register.php class='btn btn-primary' role='button'>Buy</a> <a href=register.php class='btn btn-default' role='button'>Cart</a> <a href=second.php?tb=$val&&tid=$t_id class='btn btn-info' role='button'>Specs</a></center></p>";
     echo ' </div>';
    echo '</div>';
  echo '</div>';





  //echo $row4["name"];
  //echo '<img src="'. $row4['image'].'" />';
}
      echo '</div>';
  echo '</div>';  
    echo '</div>';
    
  }
   }
 }


   
 
 
?>



<div class="foot">
<nav class="navbar navbar-default navbar">
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
</div>
</body>
</html>