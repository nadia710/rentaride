<?php

	require_once 'dataConnectISP.php';
	session_start();
	
	$car = $_GET['car'];
	$plate = $_GET['plate'];
	$color = $_GET['color'];
	$sql = $mysqli->query("SELECT * FROM carsupp WHERE car = '$car' AND plate = '$plate' AND color = '$color'");
	$rows = $sql->fetch_assoc();
	
	$car = $rows["car"];
	$plate = $rows["plate"];
	$color = $rows["color"];
	$gear = $rows["gear"];
	$total = $rows["total"];
	
	if(isset($_POST['update'])) {
		$c = strtoupper($_POST['c']);
		$noPlate = strtoupper($_POST['noPlate']);
		$col = strtoupper($_POST['col']);
		$gearT = strtoupper($_POST['gearT']);
		$tot = strtoupper($_POST['tot']);
		
		$result = $mysqli->query("UPDATE carsupp SET car = '$c', plate = '$noPlate', color = '$col', gear = '$gearT', total = '$tot' WHERE car = '$car' AND plate = '$plate' AND color = '$color'");
		
		if($result) {
			echo '<script type="text/javascript">alert("Success! Your data has been updated!");</script>';
			echo '<script>window.location.assign("updateSupp.php");</script>';
		} else {
			echo '<script type="text/javascript">alert("Failed! Error updating data, please try again.");</script>';
		}
	}
	
	if(isset($_POST['delete'])) {
		$result = $mysqli->query("DELETE FROM carsupp WHERE car = '$car' AND plate = '$plate' AND color = '$color'");
		
		if($result) {
			echo '<script type="text/javascript">alert("Success! Your data has been deleted!");</script>';
			echo '<script>window.location.assign("updateSupp.php");</script>';
		} else {
			echo '<script type="text/javascript">alert("Failed! Error deleting data, please try again.");</script>';
		}
	}
?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title>Update Car Detail</title> 
		
		<style>	
			.container {
				background: #242629;
				padding: 10px 50px 40px;
				border-radius: 20px;
				color: white;
			}
			
			.container label {
				padding: 10px;
				display: block;
				text-align: left;
				margin-bottom: 5px;
			}
			
			.container input {
				padding: 10px;
				margin-bottom: 10px;
				border: 1px solid #ccc;
				border-radius: 10px;
			}
			
			.container button {
				padding: 10px;
				border-radius: 10px;
				margin-right: 10px;
			}
			
			.btn-danger {
				background-color: red;
				border: none;
				color: white;
			}
			
			.buttons {
				text-align: center;
			}
		</style>
	</head> 
	<body> 
		<form role="form" method="post" action=""> 
			<center>
				<div class="container"> 
					<h2>UPDATE CAR DETAILS</h2>
					<table width="950" height="200" border="0"> 
						<tr><td><br></td></tr> 
						<tr>
							<td width='150'>Model</td>
							<td width='8'> : </td>
							<td><input type="text" name="c" value="<?php echo $car; ?>"/></td>
						</tr>
						<tr>
							<td width='150'>No. Plate</td>
							<td width='8'> : </td> 
							<td><input type="text" name="noPlate" value="<?php echo $plate; ?>"/></td>
						</tr> 
						<tr>
							<td width='150'>Color</td>
							<td width='8'> : </td> 
							<td><input type="text" name="col" value="<?php echo $color; ?>"/></td>
						</tr> 
						<tr>
							<td width='150'>Gear Type</td>
							<td width='8'> : </td> 
							<td><input type="text" name="gearT" value="<?php echo $gear; ?>"/></td>
						</tr> 
						<tr>
							<td width='150'>Total Rent Per Hour</td>
							<td width='8'> : </td>
							<td><input type="text" name="tot" value="<?php echo $total; ?>"/></td>
						</tr>
						<tr><td><br></td></tr> 
						<tr>
							<td colspan="2"></td>
							<td align="left">
								<div class="buttons">
									<center>
										<button type="submit" name="update" class="btn btn-primary"><b>Save Data</b></button>
										<button type="submit" name="delete" class="btn btn-danger"><b>Delete Data</b></button>
									</center>
								</div>
							</td>
						</tr>
					</table> 
				</div>
			</center>
		</form>
	</body>
</html>
