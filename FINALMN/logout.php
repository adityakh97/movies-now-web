<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "HOME.PHP";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php require_once('Connections/moviesnow.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Movies Now</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/camera.css">
<!--[if !IE]>-->
<link rel="stylesheet" href="css/blur.css">
<!--<![endif]-->
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/camera.js"></script>
<!--[if (gt IE 9)|!(IE)]><!-->
<script src="js/jquery.mobile.customized.min.js"></script>
<!--<![endif]-->
<script>
$(document).ready(function () {
    jQuery('#camera_wrap').camera({
        loader: false,
        pagination: false,
        thumbnails: false,
        height: '48.82978723404255%',
        caption: false,
        navigation: true,
        fx: 'mosaic'
    });
});
$(document).ready(function () {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
$(function () {
    var $container = $('#ib-container'),
        $articles = $container.children('article'),
        timeout;
    $articles.on('mouseenter', function (event) {
        var $article = $(this);
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            if ($article.hasClass('active')) return false;
            $articles.not($article.removeClass('blur').addClass('active'))
                .removeClass('active')
                .addClass('blur');
        }, 65);
    });
    $container.on('mouseleave', function (event) {
        clearTimeout(timeout);
        $articles.removeClass('active blur');
    });
});
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body class="page1">


<div align="right">
  
  <!--                                   logout-->
  
  
  
  <a href="<?php echo $logoutAction ?>">Logout</a>
  
  
  
  
  
  
</div>
<header>
  <div class="container_12">
    <div class="grid_12">
      <div class="menu_block">
        <h1><a href="index.php"><img src="images/logo1.png" alt=""></a> </h1>
        <nav>
          <ul class="sf-menu">
            <li class="current"><a href="logout.php">Home</a></li>
            <li class="with_ul"><a href="nowshowing.html">NOW SHOWING</a>
              <ul>
                <li><a href="english.html">ENGLISH</a></li>
                <li><a href="hindi.html">HINDI</a></li>
                <li><a href="kannada.html">KANNADA</a></li>
                <li><a href="telugu.html">TELUGU</a></li>
              </ul>
            </li>
            <li><a href="commingsoon.html">COMMING SOON</a>
             <ul>
                <li><a href="englishsoon.html">ENGLISH</a></li>
                <li><a href="hindisoon.html">HINDI</a></li>
                <li><a href="kannadasoon.html">KANNADA</a></li>
                <li><a href="telugusoon.html">TELUGU</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="slider_wrapper">
        <div id="camera_wrap">
          <div data-src="images/s2.jpg"> </div>
          <div data-src="images/s1.jpg"> </div>
          <div data-src="images/s3.jpg"> </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</header>

<div class="content">
  <div class="container_12">
    <div class="grid_12">
      <h3>NOW SHOWING</h3>
    </div>
    <div class="grid_4">
      <div class="cwrap">
        <div class="circle c1">
          <div class="info">
            <div class="title">BHARJARI</div>
            by Chethan Kumar<br>
            <a href="bharjari.php">MORE</a> </div>
        </div>
      </div>
    </div>
    <div class="grid_4">
      <div class="cwrap">
        <div class="circle c2">
          <div class="info">
            <div class="title">TARAK </div>
            by Santhosh Ananddram<br>
            <a href="tarak.php">Read More</a> </div>
        </div>
      </div>
    </div>
    <div class="grid_4">
      <div class="cwrap">
        <div class="circle c3">
          <div class="info">
            <div class="title">LET THERE BE LIGHT</div>
            by Kevin sarbo <br>
            <a href="lettherebelight.php">Read More</a> </div>
        </div>
      </div>
    </div>
   <div class="grid_12">
    <button class="button_code" type="submit"><a href="nowshowing.html">MORE</a></button>
      <h3>COMING SOON</h3>
    </div>
    <div class="grid_4">
      <div class="cwrap">
        <div class="circle c11">
          <div class="info">
            <div class="title">Deadpool 2</div>
            by David beitch <br>
            <a href="deadpool2.php">Read More</a> </div>
        </div>
      </div>
    </div>
    <div class="grid_4">
      <div class="cwrap">
        <div class="circle c21">
          <div class="info">
            <div class="title">Anjaniputra</div>
            by Harsha <br>
            <a href="anjaniputra.php">Read More</a> </div>
        </div>
      </div>
    </div>
    <div class="grid_4">
      <div class="cwrap">
        <div class="circle c31">
          <div class="info">
            <div class="title">Firangi</div>
            by Rajiv dhingra <br>
            <a href="firangi.php">Read More</a> </div>
        </div>
      </div>
    </div>
    <button class="button_code" type="submit"><a href="commingsoon.html">MORE</a></button>

  </div>
</div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_12">
      
      <div class="copy"> MoviesNow & copy; 2017 | <a href="#">Privacy Policy</a> <br>
      Design by: <a href="http://www.MoviesNow.com/">MoviesNow.com</a> </div>
  
    </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>
