
<?php
if(isset($_REQUEST['btn_add'])) //button name "btn_register"
{
	$servername = "188.166.24.55";
	$username = "laravel";
	$password = "5E3tYVTm6OJcxbHh";
	$dbname = "jepsen6-laravel";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
			$password);
	// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO hikes (name, distance, 
	duration) 
	VALUES (:name, :distance, :duration)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':distance', $distance);
		$stmt->bindParam(':duration', $duration);
	
	// insert a row
		$name = $_POST["name"];
		$distance = $_POST["distance"];
		$duration = $_POST["duration"];
		$stmt->execute();
		echo "New records created successfully";
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
}
///////////////////HTML////////////////
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">				
</head>
	<body>
	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">   
			<center><h2>NewHike Page</h2></center>
			<form method="post" class="form-horizontal">
				<div class="form-group">
				<label class="col-sm-3 control-label">name</label>
				<div class="col-sm-6">
				<input type="text" name="name" class="form-control" placeholder="enter name" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">distance</label>
				<div class="col-sm-6">
				<input type="text" name="distance" class="form-control" placeholder="enter distance" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">duration</label>
				<div class="col-sm-6">
				<input type="text" name="duration" class="form-control" placeholder="enter duration" />
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_add" class="btn btn-primary " value="ADD">
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				Want to add this hike ? ;)<a href="homepage.php"><p class="text-info"> All hikes page</p></a>		
				</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	</body>
</html>