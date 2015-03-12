<?php require_once("include/connection.php"); ?>
<?php include("include/function.php");?>
<html>

<head>
<title>SPECIFICATION	</title>

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
    padding: 15px 40px;
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
    .pic{
	position: absolute;
	padding-top: 70px;
	padding-left: 100px;
}
.spec{
	position: absolute;
	padding-top: 70px;
	padding-left: 650px;
}
.bttn{
  padding-left: 40%;
      padding-top: 830px;
      position: absolute;
      z-index: -830;
}
    .desc{
      position: absolute;
      padding-top: 600px;
      padding-left: 10%;
      width: 80%;

    }
    </style>






</head>
<body>

<!--control overflow along y axis -->
 
<div class="overflow">


<?php
   
   
     $tn=$_SESSION['product'];
	 



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
      echo "<form action =second.php class='navbar-form navbar-right' role='search'>";
        echo '<div class="form-group">';
          echo '<input type="text" name="skey" class="form-control" placeholder="Search">';
        echo '</div>';
        echo '<button type="submit" class="btn btn-default">Go</button>';
      echo '</form>';
      echo '</div>';
 echo ' </div>';
echo '</nav>';
if(isset($_GET['tb'])&&isset($_GET['tid'])){
     $table=$_GET['tb'];
     $id=$_GET['tid'];
    
     //echo $table;
     //echo $id;
	 
    $sql="SELECT * FROM $table where id ='$id'";
	$result = mysqli_query($dbc,$sql);
		if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
		}
		$row=mysqli_fetch_assoc($result);
	
	
	
	
   echo ' <div class="pic">';
    echo '<img src="'. $row['image'].'" height="444" width="475"/>';
echo '</div>';

    $file=$row['details'];
	
	$spam_words = file($file, FILE_IGNORE_NEW_LINES);
$count=count($spam_words);
//echo $count;


echo '<div class="spec">';
	echo '<div class="panel panel-default">';
  //<!-- Default panel contents -->
  echo "<div class='panel-heading'><b><h1><center>".$row['name']."</center></h1><b></div>";
echo '<table class="table">';
echo ' <tbody>';
$ctr=0;
while($count>0)
{
	$myarray=explode(',',$spam_words[$ctr]);
	$ctr++;
	$count--;
	echo'<tr>';
            echo "<td><b>".$myarray[0]."</b></td>";
            echo "<td>".$myarray[1]."</td>";
         echo ' </tr>';
}
echo ' </tbody>';
     echo ' </table>';
	 
echo '</div>';
echo '</div>';




//Buttons

echo '<div class="bttn">';
if(isset($_SESSION['user_id']))
echo "<p><a href=acart.php?zt=$table&&zid=$id  class='btn btn-success' role='button'>Buy Now</a> <a href=acart.php?zt=$table&&zid=$id class='btn btn-primary' role='button'>Add to Cart</a></p>";
else
	echo "<p><a href=register.php  class='btn btn-success' role='button'>Buy Now</a> <a href=register.php class='btn btn-primary' role='button'>Add to Cart</a></p>";
echo '</div>';







//Description panel
echo '<div class="desc">';
echo '<div class="panel panel-success">';
echo '<div class="panel-heading"><center><h3><b>Description</b></h3></center></div>';
echo '<div class="panel-body">';
$fh = fopen($row['description'], 'r');

    $pageText = fread($fh, 25000);

    echo nl2br($pageText);


echo '  </div>';
echo '</div>';
echo '</div>';

}
else if(isset($_GET['skey']))
{      $val=$_GET['skey'];
	foreach($tn as $key=>$nt)
	 {
		 $k=$nt;
		 $sql="SELECT * FROM $k where name='$val'";
		 $result=mysqli_query($dbc,$sql);
		 while($row=mysqli_fetch_assoc($result))
		 {
			 echo ' <div class="pic">';
    echo '<img src="'. $row['image'].'" height="444" width="475"/>';
echo '</div>';

    $file=$row['details'];
	$id=$row['id'];
	$spam_words = file($file, FILE_IGNORE_NEW_LINES);
$count=count($spam_words);
//echo $count;


echo '<div class="spec">';
	echo '<div class="panel panel-default">';
  //<!-- Default panel contents -->
  echo "<div class='panel-heading'><b><h1><center>".$row['name']."</center></h1><b></div>";
echo '<table class="table">';
echo ' <tbody>';
$ctr=0;
while($count>0)
{
	$myarray=explode(',',$spam_words[$ctr]);
	$ctr++;
	$count--;
	echo'<tr>';
            echo "<td><b>".$myarray[0]."</b></td>";
            echo "<td>".$myarray[1]."</td>";
         echo ' </tr>';
}
echo ' </tbody>';
     echo ' </table>';
	 
echo '</div>';
echo '</div>';




//Buttons

echo '<div class="bttn">';
if($_SESSION['user_id'])
echo "<p><a href=acart.php?zt=$k&&zid=$id class='btn btn-success' role='button'>Buy Now</a> <a href=acart.php?zt=$k&&zid=$id class='btn btn-primary' role='button'>Add to Cart</a></p>";
else
	echo "<p><a href=register.php class='btn btn-success' role='button'>Buy Now</a> <a href=register.php class='btn btn-primary' role='button'>Add to Cart</a></p>";
echo '</div>';







//Description panel
echo '<div class="desc">';
echo '<div class="panel panel-success">';
echo '<div class="panel-heading"><center><h3><b>Description</b></h3></center></div>';
echo '<div class="panel-body">';
$fh = fopen($row['description'], 'r');

    $pageText = fread($fh, 25000);

    echo nl2br($pageText);


echo '  </div>';
echo '</div>';
echo '</div>';

		 }
	 }
}


?>

</body>
</html>