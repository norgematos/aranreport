<?php
$deviceid = isset($_REQUEST['deviceid'])?$_REQUEST['deviceid']:'';
	include 'config.php';
	$query = "UPDATE `Services` SET `".$_REQUEST['action']."`='".$_REQUEST['thevalue']."' WHERE ServiceID=".$_REQUEST['serviceid'];
	echo $query;
	mysql_query($query);