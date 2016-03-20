<?php
	include 'config.php';
	
	if(isset($_POST['reportplace']) && isset($_POST['reportpunch'])){
		$query = "SELECT ServiceID FROM `Services` WHERE `Date`='".date('Y-m-d')."' AND PlaceID=".$_POST['reportplace']." AND UserID=".$UserID;
		$res = mysql_query($query);
		if(mysql_num_rows($res)>0){
			$row = mysql_fetch_assoc($res);
			$ServiceID = $row['ServiceID'];
			$query = "UPDATE `Services` SET `".$_POST['reportpunch']."`='".date('H:m:s')."' WHERE ServiceID=".$ServiceID;
		}
		else{
			$query = "INSERT `Services` (`UserID`,`PlaceID`,`Date`,`IN1`) VALUES($UserID,'".$_POST['reportplace']."','".date('Y-m-d')."','".date('H:i:s')."')";
		}
		$msg = $query;
		mysql_query($query);
	}
	$query = "SELECT * FROM `Services` WHERE UserID=$UserID AND `Date`='".date('Y-m-d')."'";
	$in1='';$out1='';$in2='';$out2='';
	$res = mysql_query($query,$con);
	if(mysql_num_rows($res)>0){
		$row = mysql_fetch_assoc($res);
		$in1 = $row['IN1'];
		$out1 = $row['OUT1'];
		$in2 = $row['IN2'];
		$out2 = $row['OUT2'];
	}
?>
				<h2><?=$name?></h2>
				<div class='form'><?=date('Y-m-d')?></div>
				<div class='form'><select name='reportplace' id='reportplace'>
				<?php
				$query = "SELECT * FROM `Places`";
				$res = mysql_query($query,$con);
				while($row = mysql_fetch_assoc($res)){
					echo '<option value='.$row['PlaceID'].'>'.$row['Name'].'</div>';
				}
				?>
				</select></div>
				<?php 
					if($in1==='00:00:00' || $in1==='')
					{ 
				?>
					<div class='form'><input class='punch' type='button' value='IN1'></div>
				<?php 
					}
				?>
				<?php if($in1!=='' && $in1!=='00:00:00' && ($out1==='00:00:00' || $out1==='')){ echo "<div class='form'><input class='punch' type='button' value='OUT1'></div>"; }?>
				<?php if($out1!=='' && $out1!=='00:00:00' && ($in2==='00:00:00' || $in2==='')){ echo "<div class='form'><input class='punch' type='button' value='IN2'></div>"; }?>
				<?php if($in2!=='' && $in2!=='00:00:00' && ($out2==='00:00:00' || $out2==='')){ echo "<div class='form'><input class='punch' type='button' value='OUT2'></div>"; }?>