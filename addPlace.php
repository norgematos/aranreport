<?php
include 'config.php';
if(isset($_POST['place']) && trim(isset($_POST['place']))!==''){
$query = "INSERT `Places` (`Name`) VALUES('".$_POST['place']."')";
mysql_query($query);
}

$query = "SELECT `Name` FROM `users` WHERE UserID=$UserID";
$res = mysql_query($query,$con);
$row = mysql_fetch_assoc($res);
$name = $row['Name'];
?>
			<h2>Add Place</h2>
			<div>
				<form method='post'>
				<div class='form'>Place: <input type="text" name='place' id='place'></div>
				<div class='form'><input type='Submit' value='Add'></div>
				</form>
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
			
