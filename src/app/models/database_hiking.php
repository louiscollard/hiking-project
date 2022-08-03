
<?php
require_once '/application/app/models/database.php';

class Hikes{
public function addHike($data){
if(isset($_REQUEST['btn_add'])) //button name "btn_register"
{
	$servername = "188.166.24.55";
	$username = "laravel";
	$password = "5E3tYVTm6OJcxbHh";
	$dbname = "jepsen6-laravel";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("INSERT INTO hikes (name, distance, 
	duration) 
	VALUES (:name, :distance, :duration)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':distance', $distance);
		$stmt->bindParam(':duration', $duration);
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
}







public function updateHike(){
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
$sql = "UPDATE hikes SET name=:uname, distance=:udistance , duration=:uduration WHERE id=40";

$statement = $conn->prepare($sql);

if($statement->execute(array(	':uname'	=>$name, 
':udistance'	=>$distance, 
':uduration'=>$duration))) {
  echo "Post updated successfully!";
}
}
}






public function deleteHike(){
    
if(isset($_REQUEST['btn_delete'])) //button name "btn_register"
{
	$servername = "188.166.24.55";
	$username = "laravel";
	$password = "5E3tYVTm6OJcxbHh";
	$dbname = "jepsen6-laravel";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("DELETE FROM hikes WHERE id=40"); 
		$stmt->execute();
		echo " Records DELETED successfully";
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
}
}
}
?>