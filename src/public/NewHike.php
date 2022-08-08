
<?php
require_once "connection.php";
if(isset($_REQUEST['btn_add'])) //button name "btn_register"
{
    $Name	= strip_tags($_REQUEST['txt_name']);	//textbox name "txt_email"
	$CreationDate	= strip_tags($_REQUEST['txt_CreationDate']);	//textbox name "txt_email"
	$Distance	= strip_tags($_REQUEST['txt_Distance']);	//textbox name "txt_email"
	$Duration	= strip_tags($_REQUEST['txt_Duration']);	//textbox name "txt_email"
	$Elevation_gain		= strip_tags($_REQUEST['txt_Elevation_gain']);		//textbox name "txt_email"
	$description	= strip_tags($_REQUEST['txt_description']);	//textbox name "txt_password"
	if(empty($Name)){
		$errorMsg[]="Please enter Name";	//check username textbox not empty
	}
	else if(empty($CreationDate)){
		$errorMsg[]="Please enter CreationDate";	//check email textbox not empty 
	}
	else if(empty($Distance)){
		$errorMsg[]="Please enter Distance";	//check passowrd textbox not empty
	}
    else if(empty($Duration)){
		$errorMsg[]="Please enter Duration";	//check passowrd textbox not empty
	}
    else if(empty($Elevation_gain)){
		$errorMsg[]="Please enter Elevation_gain";	//check passowrd textbox not empty
	}
    else if(empty($description)){
		$errorMsg[]="Please enter description";	//check passowrd textbox not empty
	}

	else
	{	
		try
		{	
			$select_stmt=$db->prepare("SELECT name,creation_date,distance,duration,elevation_gain,description FROM hikes
										WHERE name=:uname OR distance=:udistance"); // sql select query
			$select_stmt->execute(array(':uname'=>$Name, ':udistance'=>$Distance)); //execute query
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);	
							
				$insert_stmt=$db->prepare("INSERT INTO hikes (name,creation_date,distance,duration,elevation_gain,description,user_id) VALUES
																(:uname,:ucreation_date,:udistance,:uduration,:uelevation_gain,:udescription,:uuser_id)"); 		//sql insert query
				
				if($insert_stmt->execute(array(	':uname'	=>$Name,
                                                ':ucreation_date' => $CreationDate,
												':udistance'=>$Distance,
												':uduration'=>$Duration,
                                                ':uelevation_gain' => $Elevation_gain,
                                                ':udescription' => $description,
                                                ':uuser_id' => $_GET['id']
                                            ))){
					$registerMsg="ADD Successfully..... Please Click On Login Account Link"; //execute query success message
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
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
		if(isset($registerMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $registerMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<h2>Add a hike</h2>
			<form method="post" class="form-horizontal">
				<div class="form-group">
				    <label class="col-sm-3 control-label">Name</label>
				    <div class="col-sm-6">
				        <input type="text" name="txt_name" class="form-control" placeholder="Enter hike's name" />
				    </div>
                </div>
				<div class="form-group">
				    <label class="col-sm-3 control-label">Creation date</label>
				    <div class="col-sm-6">
				        <input type="text" name="txt_CreationDate" class="form-control" placeholder="Enter a date" />
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-3 control-label">Distance</label>
                    <div class="col-sm-6">
				        <input type="text" name="txt_Distance" class="form-control" placeholder="Enter a distance" />
				    </div>
				</div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Duration</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_Duration" class="form-control" placeholder="Enter a duration for the hike" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Elevation gain</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_Elevation_gain" class="form-control" placeholder="Enter an elevation" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_description" class="form-control mb-3" placeholder="Enter a description" />
                    </div>
                </div>

				<div class="form-group">
				    <div class="col-sm-offset-3 col-sm-9 m-t-15">
				        <input type="submit"  name="btn_add" class="btn btn-success mb-3" value="ADD+">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                    You have already add? <a href="/login"><p class="text-info">Back</p></a>
				    </div>
				</div>
			</form>
		</div>
	</div>
	</div>
<?php include '../app/views/includes/footer.php' ?>