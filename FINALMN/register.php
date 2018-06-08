<?php require_once('Connections/moviesnow.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO login (user_id, username, password, repassword) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['user_id'], "int"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['repassword'], "text"));

  mysql_select_db($database_moviesnow, $moviesnow);
  $Result1 = mysql_query($insertSQL, $moviesnow) or die(mysql_error());

  $insertGoTo = "login page.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?" ;
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>MOVIESNOW</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/loginstyle.css">

  
</head>
<body>
<br>
<br>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">

<div class="container">
  <div class="card"></div>
  <div class="card">

    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method="post">
     
      <div class="input-container">
        <input type="email" name="username" id="username" required/>
        <label>Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password" id="password" required pattern="[A-Za-z0-9]{6,}"/>
        <label>Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="repassword" id="password" pattern="[A-Za-z0-9]{6,}" required/>
        <label>Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Register</span></button>
      </div>
 
  <input type="hidden" name="MM_insert" value="form1">
</form>
 </div>
</div>
<?php 
if(isset($_GET['error'])==true)
{?>
<script>
alert ("INVALID PASSWORD/USERNAME");
</script>
<?php
}
?>
<p>&nbsp;</p>
<!--                                   <div class="back"><a href="login page.php">back</a></div>                    -->
<!-- Mixins-->
<!-- Pen Title-->

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>

