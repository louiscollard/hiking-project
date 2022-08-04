
<?php
if(isset($_REQUEST['btn_update'])) //button name "btn_register"
{
    $name	= strip_tags($_REQUEST['name']);	//textbox name "txt_email"
	$distance		= strip_tags($_REQUEST['distance']);		//textbox name "txt_email"
	$duration	= strip_tags($_REQUEST['duration']);

$host     = '188.166.24.55';
$db       = 'jepsen6-laravel';
$user     = 'laravel';
$password = '5E3tYVTm6OJcxbHh';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
     $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
     echo $e->getMessage();
}

$data = [
     'seba', 185, 2
];

$sql = "UPDATE hikes SET name=:uname, distance=:udistance , duration=:uduration WHERE id=40";

$statement = $conn->prepare($sql);

if($statement->execute(array(	':uname'	=>$name,
':udistance'	=>$distance,
':uduration'=>$duration))) {
  echo "Post updated successfully!";
}

}
include '../app/views/includes/header.php';
?>
	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
			<center><h2>Update Page</h2></center>
			<form method="post" class="form-horizontal">
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" name="name" class="form-control" placeholder="Enter name" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Distance</label>
				<div class="col-sm-6">
				<input type="text" name="distance" class="form-control" placeholder="Enter distance" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Duration</label>
				<div class="col-sm-6">
				<input type="text" name="duration" class="form-control mb-3" placeholder="Enter duration for the hike" />
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_update" class="btn btn-success mb-3" value="Update">
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				Want to add this hike ? ;)<a href="/home"><p class="text-info"> All hikes page</p></a>
				</div>
				</div>
			</form>
		</div>
	</div>
	</div>
<?php include '../app/views/includes/footer.php' ?>