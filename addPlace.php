<?php
//$deviceid = isset($_REQUEST['deviceid'])?$_REQUEST['deviceid']:'';
//echo $devideid;
include_once 'config.php';
$row = checkdevice($deviceid);
	$name = $row['Name'];
	$UserID = $row['UserID'];
	//echo 'row: ';print_r($row);
if($UserID=='') header('Location: http://norgematos.net/aranreport/loginpage.php');
if(isset($_REQUEST['place']) && trim(isset($_REQUEST['place']))!==''){
$query = "INSERT `Places` (`Name`) VALUES('".$_REQUEST['place']."')";
mysql_query($query);
}

$query = "SELECT `Name` FROM `users` WHERE UserID=$UserID";
$res = mysql_query($query,$con);
$row = mysql_fetch_assoc($res);
$name = $row['Name'];
?>
			<h2>Add Place</h2>
			<div>
				<div class='form'>Place: <input type="text" name='place' id='place'></div>
				<div class='form'><input id='setShift' type='Submit' value='Add'></div>
			</div>
			<div class='table'>
			<?php
			$query = "SELECT * FROM `Places` ORDER BY `Name`";
			$res = mysql_query($query,$con);
			while($row = mysql_fetch_assoc($res)){
				echo '<div class="tr">'.$row['Name'].'</div>';
			}
			?>
			</div>
			
