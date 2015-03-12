
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
    <link rel="stylesheet" href="a.css">

    <style>

    .head{
      border-radius: 0px;
      z-index: 100px;
    }
    .items{
      margin: 80px;
      margin-top: 0px;
      margin-bottom: 0px;
    }
    .foot{
      width: 100%;
    }
    .overflow{
      overflow-x: hidden;
    }
    .imga {
        opacity: 1.0;
    transition: opacity 1s ease-in-out;
    -moz-transition: opacity 1s ease-in-out;
    -webkit-transition: opacity 1s ease-in-out;
}
.imga:hover {
    opacity: 0.5;
    transition: opacity .55s ease-in-out;
    -moz-transition: opacity .55s ease-in-out;
    -webkit-transition: opacity .55s ease-in-out;
}​

    </style>
<body>
  <div class="overflow">

<div calss="cont" style="padding-top:100px">





    <!-- Header -->


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Shop Now  <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="display.php?key=Mobiles">Mobiles <span class="sr-only">(current)</span></a></li>
        <li><a href="display.php?key=Laptops">Laptops </a></li>
        <li><a href="display.php?key=Acer">Accessories </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span class="glyphicon glyphicon-shopping-cart fa-1x" aria-hidden="true"></span></a></li>
        <li><a href="register.php">Sign in</a></li>
        <li><a href="register.php">Sign up</a></li>
      </ul>
      <form  action=second.php class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" name ="skey" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Go</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
































<!-- the reason for the tabindex is to support webkit //-->
  <div class="css-slider-mask">
    <!-- there are a number of add on modules which are demo-able by the javascript checkboxes added to this example page //-->
    <ul class="css-slider with-responsive-images with-selection-disabled with-reflection with-fade-in">
      <li class="slide" tabindex="1" id="l1">
        <span class="slide-outer">
          <span class="slide-inner">
            <!-- each slide-gfx needs a unique id if you wish to use reflections, you will also need to update .with-reflection in core.css //-->
            <span class="slide-gfx" id="s1">
              <img src="a.jpg" />
            </span>
          </span>
        </span>
      </li>
      <li class="slide" tabindex="1" id="l2">
        <span class="slide-outer">
          <span class="slide-inner">
            <span class="slide-gfx" id="s2">
              <img src="b.jpg" />
            </span>
          </span>
        </span>
      </li>
      <li class="slide" tabindex="1" id="l3">
        <span class="slide-outer">
          <span class="slide-inner">
            <span class="slide-gfx" id="s3">
              <img src="c.jpg"  />
            </span>
          </span>
        </span>
      </li>
      <li class="slide" tabindex="1" id="l4">
        <span class="slide-outer">
          <span class="slide-inner">
            <span class="slide-gfx" id="s4">
              <img src="a.jpg" />
            </span>
          </span>
        </span>
      </li>
      <li class="slide" tabindex="1" id="l5">
        <span class="slide-outer">
          <span class="slide-inner">
            <span class="slide-gfx" id="s5">
              <img src="b.jpg" />
            </span>
          </span>
        </span>
      </li>
    </ul>
  </div>
<!-- This has been added here because mask: only supports same-domain requests //-->
<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient gradientUnits="objectBoundingBox" id="gradient" x2="0" y2="1">
      <stop stop-color="rgba(0,255,255,0.00)" offset="0.0"/>
      <stop stop-color="rgba(0,255,255,0.30)" offset="0.5"/>
      <stop stop-color="rgba(0,255,255,1.00)" offset="1.0"/>
    </linearGradient>
    <radialGradient id="gradient2">
        <stop offset="10%" stop-color="rgba(255,255,255,1)"/>
        <stop offset="100%" stop-color="rgba(255,255,255,0)"/>
    </radialGradient>
    <mask id="mask" maskUnits="objectBoundingBox" maskContentUnits="objectBoundingBox" x="0" y="0" width="100%" height="100%">
      <ellipse fill="url(#gradient2)" cx="0" cy="1" rx="1" ry="0.8"/>
      <ellipse fill="url(#gradient2)" cx="1" cy="1" rx="1" ry="0.8"/>
    </mask>
  </defs>
</svg>






<!-- Thumbnail -->
<div class="items" style="position:relative;top:-400px;" >
<div container>
<div class="row">

<div class="imga">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href = "display.php?key=Laptops"><img src="img/dell.png" alt="Laptops" height="300" width="345"></a>
      <div class="caption">
        <h3>Laptops</h3>
      </div>
    </div>
  </div>
</div>


<div class="imga">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href = "display.php?key=Mobiles"><img src="img/asus.jpg" alt="Laptops" height="300" width="345"></a>
      <div class="caption">
        <h3>Mobiles</h3>
      </div>
    </div>
  </div>

</div>


<div class="imga">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href = "display.php?key=acer"><img src="img/l.jpg" alt="Laptops" height="300" width="345"></a>
      <div class="caption">
        <h3>Accessories</h3>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>













<!-- Footer  -->


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