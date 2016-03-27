<?php
//session_start();
include 'config.php';
//print_r( $_REQUEST);

if(isset($_REQUEST['username'])){
	$query = "SELECT * FROM `users` WHERE username='".$_REQUEST['username']."'";
	$res = mysql_query($query,$con); 
	$row = mysql_fetch_assoc($res);
	if($_REQUEST['password']===$row['Password']){
		$query = "update `users` set `DeviceID`='".$_REQUEST['deviceid']."' WHERE `UserID`=".$row['UserID'];
		mysql_query($query);
		$UserID = $row['UserID'];
		$name= $row['Name'];
	}
	else{
		$UserID=-1;
	}
}
else{
	if(isset($_REQUEST['deviceid']) && $_REQUEST['deviceid']!=''){
		$query = "SELECT * FROM `users` WHERE DeviceID='".$_REQUEST['deviceid']."'";
		$res = mysql_query($query,$con);
		if(mysql_num_rows($res)){
			$row = mysql_fetch_assoc($res);
			$UserID = $row['UserID'];
			$name= $row['Name'];
		}
	}
	else
	{
		?>
		<div style='text-align:center;'>Login</div>
		<?php 
			if($UserID==-1){
				?>
				<div style='color: red; text-align:center;'>User/Password incorrect.</div>
				<?php
			};
		?>
		<div style='text-align:center;'><input type='text' name='username' id='username' placeholder='username'></div>
		<div style='text-align:center;'><input type='password' name='password' id='password' placeholder='password'></div>
		<div style='text-align:center; margin-top: 20px;'><span class='btn btn-login'>Submit</span></div>
		<?php
	}
}
//echo 'user '.$UserID;
if($UserID!='' && $UserID!=-1){
	include 'setPunch.php';
}
if($UserID==''){
	header('location: http://norgematos.net/aranreport/loginpage.php');
}

