<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_moviesnow = "localhost";
$database_moviesnow = "moviesnow";
$username_moviesnow = "root";
$password_moviesnow = "";
$moviesnow = mysql_pconnect($hostname_moviesnow, $username_moviesnow, $password_moviesnow) or trigger_error(mysql_error(),E_USER_ERROR); 
?>