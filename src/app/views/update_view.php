
<?php
include_once "/application/app/views/includes/header.php";
include_once "/application/app/helpers/session_helper.php";
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
			<center><h2>Update Page</h2></center>
            <?php flash('updateHike') ?>

			<form method="post" class="form-horizontal">
				<div class="form-group">
				<label class="col-sm-3 control-label">name</label>
				<div class="col-sm-6">
				<input type="text" name="name" class="form-control" placeholder="enter name" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label"></label>
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
				<input type="submit"  name="btn_update" class="btn btn-primary " value="update">
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
<?php include "/application/app/views/includes/footer.php" ?>