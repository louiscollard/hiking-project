<?php
include "/application/app/views/includes/header.php";
include_once "/application/app/helpers/session_helper.php";
?>

<div class="wrapper">

    <div class="container">

        <div class="col-lg-12">
            <h2>Login Page</h2>

            <?php flash("login")?>

            <form method="post" class="form-horizontal" action="/login">
                <input type="hidden" name="type" value="login">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username or Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="firstname/email" class="form-control" placeholder="Enter an username or email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <input type="submit" name="btn_login" class="btn btn-success" value="Login">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        You don't have a account register here? <a href="register"><p class="text-info">Register Account</p></a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        Want to add an hike ? <a href="NewHike.php"><p class="text-info">ADD</p></a>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>
<?php include "/application/app/views/includes/footer.php" ?>
