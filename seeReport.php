<?php
$deviceid = isset($_REQUEST['deviceid'])?$_REQUEST['deviceid']:'';
	include_once 'config.php';
	$row = checkdevice($deviceid);
	$name = $row['Name'];
	$UserID = $row['UserID'];
	
	if($UserID=='') header('Location: http://norgematos.net/aranreport/loginpage.php');
	$query = "SELECT * FROM `Services` WHERE UserID=$UserID";
	$res = mysql_query($query,$con);
	
	
?>
				<h2><?=$name?></h2>
				<div class='table'>
				<?php
				if(mysql_num_rows($res)>0){
					while($row = mysql_fetch_assoc($res)){
					?>
					<div class='tr' style='font-size: 60%;'>
						<span><b><?=$row['Date']?></b></span> | <span><?=$row['IN1']?></span> | <span><?=$row['OUT1']?></span> | <span><?=$row['IN2']?></span> | <span><?=$row['OUT2']?></span>
					</div>
					<?php
					}
				}
				?>
				</div>