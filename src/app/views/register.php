
<?php
include_once "/application/app/views/includes/header.php";
include_once "/application/app/helpers/session_helper.php";
?>
<div class="wrapper">
    <div class="container">
        <div class="col-lg-12">

            <h2>Register Page</h2>

            <?php flash('register') ?>

            <form method="post" class="form-horizontal" action="/register">
                <input type="hidden" name="type" value="register">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-6">
                        <input type="text" name="firstname" class="form-control" placeholder="Enter username" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="email" class="form-control" placeholder="Enter an email" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" class="form-control" placeholder="Enter a password" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <input type="submit"  name="btn_register" class="btn btn-primary " value="Register">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        You have an account register here? <a href="login"><p class="text-info">Login Account</p></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "/application/app/views/includes/footer.php" ?>