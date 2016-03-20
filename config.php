<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
date_default_timezone_set('America/New_York');
$con = mysql_connect('norgematosnet.ipagemysql.com','aranuser','aranpass');
mysql_select_db('aranreport',$con);
$UserID=1;

$query = "SELECT `Name` FROM `users` WHERE UserID=$UserID";
$res = mysql_query($query,$con);
$row = mysql_fetch_assoc($res);
$name = $row['Name'];