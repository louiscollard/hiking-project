
<?php
if(isset($_REQUEST['btn_update'])) //button name "btn_register"
{
    $name	= strip_tags($_REQUEST['txt_name']);	//textbox name "txt_email"
	$distance		= strip_tags($_REQUEST['txt_Distance']);		//textbox name "txt_email"
	$duration	= strip_tags($_REQUEST['txt_Duration']);
    $Elevation_gain    = strip_tags($_REQUEST['txt_Elevation_gain']);        //textbox name "txt_email"
    $description    = strip_tags($_REQUEST['txt_description']);

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
$ID=$_GET["q"];
$sql = "UPDATE hikes SET name=:uname, distance=:udistance , duration=:uduration,elevation_gain=:uele,description=:udesc WHERE id=$ID";

$statement = $conn->prepare($sql);

if($statement->execute(array(
        ':uname'	=>$name,
    ':udistance'	=>$distance,
    ':uduration'    =>$duration,
    ':uele'=>$Elevation_gain,
    ':udesc'=>$description
))) {
    $updateMsg = "Post updated successfully!";
}

}
include '../app/views/includes/header.php';
?>

<div class="wrapper">
    <div class="container">
        <div class="col-lg-12">
            <?php
            if(isset($errorMsg))
            {
                foreach($errorMsg as $error)
                {
                    ?>
                    <div class="alert alert-danger">
                        <strong>WRONG ! <?php echo $error; ?></strong>
                    </div>
                    <?php
                }
            }
            if(isset($updateMsg))
            {
                ?>
                <div class="alert alert-success">
                    <strong><?php echo $updateMsg; ?></strong>
                </div>
                <?php
            }
            ?>
            <h2>Update Page</h2>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_name" class="form-control" value= "<?php echo $_GET['FormName']?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Distance</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_Distance" class="form-control" value= "<?php echo $_GET['Formdist']?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Duration</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_Duration" class="form-control" value= "<?php echo $_GET['Formdur']?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Elevation gain</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_Elevation_gain" class="form-control" value= "<?php echo $_GET['Formelevation']?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">description</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_description" class="form-control mb-3" value= "<?php echo $_GET['Formdesc']?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15 mb-3">
                        <input type="submit"  name="btn_update" class="btn btn-success " value="Update">
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