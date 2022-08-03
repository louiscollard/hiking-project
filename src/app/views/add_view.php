
<?php
include_once "/application/app/views/includes/header.php";
include_once "/application/app/controllers/hike_controller.php";

?>
	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">   
			<center><h2>NewHike Page</h2></center>

            <?php  ('addHike') ?>

            <form method="post" class="form-horizontal" action="/register">
                <div class="form-group">
                    <label class="col-sm-3 control-label">name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" placeholder="Enter name" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">distance</label>
                    <div class="col-sm-6">
                        <input type="text" name="distance" class="form-control" placeholder="Enter an distance" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">duration</label>
                    <div class="col-sm-6">
                        <input type="text" name="duration" class="form-control" placeholder="Enter a duration" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <input type="submit"  name="btn_add" class="btn btn-primary " value="ADD">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        Add the hike? <a href="login"><p class="text-info">Login Account</p></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "/application/app/views/includes/footer.php" ?>