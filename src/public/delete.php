
<?php
if(isset($_REQUEST['btn_delete'])) //button name "btn_register"
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
		$stmt = $conn->prepare("DELETE FROM hikes WHERE id=40"); 

	// insert a row
		$stmt->execute();
		echo " Records DELETED successfully";
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
	
}

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
			<center><h2>DELETE Page</h2></center>
			<form method="post" class="form-horizontal")>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_delete" class="btn btn-primary " value="delete">
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				Want to DELETE this hike ? ;)<a href="homepage.php"><p class="text-info"> All hikes page</p></a>		
				</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	</body>
</html>