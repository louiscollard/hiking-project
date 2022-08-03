
<?php
include_once "/application/app/views/includes/header.php";
include_once "/application/helpers/session_helper.php";
?>
<div class="wrapper">
    <div class="container">
        <div class="col-lg-12">

            <h2>AddHike Page</h2>

            <?php flash('add') ?>

            <form method="post" class="form-horizontal" action="add">
                <div class="form-group">
                    <label class="col-sm-3 control-label">name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" placeholder="Enter name" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Distance</label>
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
                        <input type="text"  name="btn_add" class="btn btn-primary " value="add">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        Go back on the main page<a href="login"><p class="text-info">Login Account</p></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "/application/app/views/includes/footer.php" ?>