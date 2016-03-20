<?php
include 'config.php';
$UserID=1;
//print_r($_POST);
if(isset($_POST['place']) && $_POST['shift']){
	$query = "SELECT ShiftID FROM `Shifts` WHERE PlaceID=".$_POST['place']." AND UserID=".$UserID;
	$res = mysql_query($query);
	if(mysql_num_rows($res)>0){
		$row = mysql_fetch_assoc($res);
		$ShiftID = $row['ShiftID'];
		$query = "UPDATE `Shifts` SET Shift=".$_POST['shift']." WHERE ShiftID=".$ShiftID;
	}
	else{
		$query = "INSERT `Shifts` (`UserID`,`PlaceID`,`Shift`) VALUES($UserID,'".$_POST['place']."','".$_POST['shift']."')";
	}
	$msg = $query;
	mysql_query($query);
}

//echo $msg;
?>
			
			<h2><?=$name?>'s Shift</h2>
			<div>
				<form method='post'>
				<div class='form'>Place: <select name='place' id='place'>
				<?php
				$query = "SELECT * FROM `Places`";
				$res = mysql_query($query,$con);
				while($row = mysql_fetch_assoc($res)){
					echo '<option value='.$row['PlaceID'].'>'.$row['Name'].'</div>';
				}
				?></select>
				</div>
				<div class='form'>Shift: <input type="number" step='0.01' name='shift' id='shift'></div>
				<div class='form'><input type='Submit' value='Set'></div>
				</form>
			</div>
			<div class='table'>
			<?php
			$query = "SELECT * FROM `Shifts` s INNER JOIN `Places` p ON s.PlaceID=p.PlaceID";
			$res = mysql_query($query,$con);
			while($row = mysql_fetch_assoc($res)){
				echo '<div class="tr">'.$row['Name'].': '.$row['Shift'].'</div>';
			}
			?>
			</div>
			
