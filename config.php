<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
date_default_timezone_set('America/New_York');
$con = mysql_connect('norgematosnet.ipagemysql.com','aranuser','aranpass');
mysql_select_db('aranreport',$con);
$name = '';
$UserID='';
//print_r($_REQUEST);
$deviceid = isset($_REQUEST['deviceid'])?$_REQUEST['deviceid']:'';
//echo ' id '.$deviceid;
function checkdevice($deviceid){
	$query = "SELECT `Name`,`UserID` FROM `users` WHERE `DeviceID`='".$deviceid."'";
	//echo $query;
	$res = mysql_query($query);
	return mysql_fetch_assoc($res);
	
}