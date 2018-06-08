<?php
mysql_connect('localhost','root','');

mysql_select_db('moviesnow');

$sql="SELECT m.Mov_id, m.Mov_Title, m.Mov_Year, m.Mov_Lang, m.Mov_Desp, r.Rev_Stars, a.Act_Name,c.Role,d.Dir_Name FROM movies m, rating r,cast c,actor a, director d WHERE m.Mov_id=r.Mov_id and a.Act_id=c.Act_id and d.Dir_id=m.Dir_id and m.Mov_id=405";
$records=mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>MOVIESNOW</title>
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
	<title>DDLJ</title>
</head>
<body>
    <div class="container_12">
    <div class="grid_12">
      <div class="slider_wrapper">
        <div id="camera_wrap">
          <div data-src="images/ddlj1.jpg"> </div>
          <div data-src="images/ddlj2.jpg"> </div>
          <div data-src="images/ddlj.jpg"> </div>
        </div>
      </div>      
      </div>
      </div> 
    <?php
while ($s=mysql_fetch_assoc($records)) {
	echo "<tr><center>";
	echo "<br>";
	?><strong><em>MOVIE :</em></strong>
    <?php
	echo "<td>".$s['Mov_Title']."</td>";
	echo "<br>";
		echo "<br>";
	?><strong><em>RELEASE YEAR : </em></strong><?php
	echo "<td>".$s['Mov_Year']."</td>";
	echo "<br>";
		echo "<br>";
	?><strong><em>LANGUAGE : </em></strong><?php
	echo "<td>".$s['Mov_Lang']."</td>";
	echo "<br>";
		echo "<br>";
	?><strong><em>DESCRIPTION : </em></strong><?php
	echo "<td>".$s['Mov_Desp']."</td>";
	echo "<br>";
		echo "<br>";
	?><strong><em>RATINGS : </em></strong><?php
	echo "<td>".$s['Rev_Stars']."(MOVIES NOW)</td>";
	echo "<br>";
		echo "<br>";
	?><center>
<span class="imdbRatingPlugin" data-user="ur69108916" data-title="tt0112870" data-style="p2"><a href="http://www.imdb.com/title/tt0112870/?ref_=plg_rt_1"><img src="http://g-ecx.images-amazon.com/images/G/01/imdb/plugins/rating/images/imdb_38x18.png" alt=" Dilwale Dulhania Le Jayenge
(1995) on IMDb" />
</a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="http://g-ec2.images-amazon.com/images/G/01/imdb/plugins/rating/js/rating.min.js";stags.parentNode.insertBefore(js,stags);})(document,'script','imdb-rating-api');</script></center>
<?php
	?>
	<strong><em>DIRECTOR : </em></strong><?php
	echo "<td>".$s['Dir_Name']."</td>";
	echo "<br>";
		echo "<br>";
	?><strong><em>ACTOR : </em></strong><?php
	echo "<td>".$s['Act_Name']."</td>";
	echo "<br>";
		echo "<br>";
		?><strong><em>ROLE : </em></strong><?php
	echo "<td>".$s['Role']."</td>";
	echo "<br>";
		echo "<br>";
	echo "</centre></tr>";
	exit;
}
?>
</body>
</html>