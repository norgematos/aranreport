<?php
$deviceid = isset($_REQUEST['deviceid'])?$_REQUEST['deviceid']:'';
	include_once 'config.php';
	$row = checkdevice($deviceid);
	$name = $row['Name'];
	$UserID = $row['UserID'];
	//if($UserID=='') header('Location: http://norgematos.net/aranreport/loginpage.php');
	$ServiceID = '';
	if(isset($_REQUEST['reportplace']) && isset($_REQUEST['reportpunch'])){
		$query = "SELECT ServiceID FROM `Services` WHERE `Date`='".date('Y-m-d')."' AND PlaceID=".$_REQUEST['reportplace']." AND UserID=".$UserID;
		$res = mysql_query($query);
		if(mysql_num_rows($res)>0){
			$row = mysql_fetch_assoc($res);
			$ServiceID = $row['ServiceID'];
			$query = "UPDATE `Services` SET `".$_REQUEST['reportpunch']."`=CURTIME() WHERE ServiceID=".$ServiceID;
		}
		else{
			$query = "INSERT `Services` (`UserID`,`PlaceID`,`Date`,`IN1`) VALUES($UserID,'".$_REQUEST['reportplace']."','".date('Y-m-d')."',CURTIME())";
		}
		$msg = $query;
		mysql_query($query);
	}
	$query = "SELECT * FROM `Services` WHERE UserID=$UserID AND `Date`='".date('Y-m-d')."' AND `IN1`<>'00:00:00'";
	$in1='';$out1='';$in2='';$out2='';$placeid='';
	$res = mysql_query($query,$con);
	if(mysql_num_rows($res)>0){
		$row = mysql_fetch_assoc($res);
		$in1 = $row['IN1'];
		$out1 = $row['OUT1'];
		$in2 = $row['IN2'];
		$out2 = $row['OUT2'];
		$ServiceID = $row['ServiceID'];
		$placeid = $row['PlaceID'];
	}
?>
				<h2><?=$name?></h2>
				<div class='form'><?=date('Y-m-d')?></div>
				<div class='form'><select name='reportplace' id='reportplace'>
				<?php
				$query = "SELECT * FROM `Places`";
				$res = mysql_query($query,$con);
				while($row = mysql_fetch_assoc($res)){
					if($placeid==='' || $row['PlaceID']==$placeid) echo '<option value='.$row['PlaceID'].'>'.$row['Name'].'</div>';
				}
				?>
				</select></div>
				<?php 
					if($in1==='00:00:00' || $in1==='')
					{ 
				?>
					<div class='form'><span class='punch btn'>IN1</span></div>
				<?php 
					}
				?>
				<?php if($in1!=='' && $in1!=='00:00:00' && ($out1==='00:00:00' || $out1==='')){ 
				?>
					<div class='form'><span class='punch btn'>OUT1</span></div>
				<?php 
					}
				?>
				<?php if($out1!=='' && $out1!=='00:00:00' && ($in2==='00:00:00' || $in2==='')){ 
				?>
					<div class='form'><span class='punch btn'>IN2</span></div>
				<?php 
					}
				?>
				<?php 
				if($in2!=='' && $in2!=='00:00:00' && ($out2==='00:00:00' || $out2===''))
				{ 
				?>
					<div class='form'><span class='punch btn'>OUT2</span></div>
				<?php 
				}
				?>
				<div class='table'>
					<input type="hidden" id='ServiceID' value='<?=$ServiceID?>'>
					<input type="hidden" id='UserID' value='<?=$UserID?>'>
					<?php 
					if($in1!=='00:00:00' && $in1!=='')
					{ 
					?>
						<div class='tr'>IN1 <input class='time' type="time" id="IN1_time" value="<?php echo $in1; ?>"></div>
					<?php 
					}
					?>
					<?php if($out1!=='00:00:00' && $out1!=='')
					{ 
					?>
						<div class='tr'>OUT1 <input class='time' type="time" id="OUT1_time" value="<?php echo $out1; ?>"></div>
					<?php 
					}
					?>
					<?php 
					if($in2!=='00:00:00' && $in2!=='')
					{ 
					?>
						<div class='tr'>IN2 <input class='time' type="time" id="IN2_time" value="<?php echo $in2; ?>"></div>
					<?php 
					}
					?>
					<?php if($out2!=='00:00:00' && $out2!=='')
					{ 
					?>
						<div class='tr'>OUT2 <input class='time' type="time" id="OUT2_time" value="<?php echo $out2; ?>"></div>
					<?php 
					}
					?>
				</div>