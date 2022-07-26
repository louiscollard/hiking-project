<?php

require_once 'connection.php';

session_start();
/*
if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
    header("location: /home");
}
*/

if(isset($_REQUEST['btn_login']))	//button name is "btn_login"
{
    $username	=strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
    $email		=strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
    $password	=strip_tags($_REQUEST["txt_password"]);			//textbox name "txt_password"

    if(empty($username)){
        $errorMsg[]="please enter username or email";	//check "username/email" textbox not empty
    }
    else if(empty($email)){
        $errorMsg[]="please enter username or email";	//check "username/email" textbox not empty
    }
    else if(empty($password)){
        $errorMsg[]="please enter password";	//check "passowrd" textbox not empty
    }
    else
    {
        try
        {
            $select_stmt=$db->prepare("SELECT * FROM users WHERE firstname=:uname OR email=:uemail"); //sql select query
            $select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));	//execute query with bind parameter
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

            if($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
            {
                if($username=="administrateur" && $password=="administrateur"){
                    $_SESSION["admin_login"] = $row["id"];    //session name is "user_login"
                    $loginMsg = "Successfully Login AS ADMIN...";        //user login success message
                    header("refresh:2; /admin");
                } else {
                    if($username==$row["firstname"] OR $email==$row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
                    {
                        if(password_verify($password, $row["password"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
                        {
                            $_SESSION["user_login"] = $row["id"];	//session name is "user_login"
                            $loginMsg = "Successfully Login...";		//user login success message
                            header("refresh:2; /welcome");			//refresh 2 second after redirect to "welcome.php" page
                        }
                        else
                        {
                            $errorMsg[]="wrong password";
                        }
                    }
                    else
                    {
                        $errorMsg[]="wrong username or email";
                    }
                }

            }
            else
            {
                $errorMsg[]="wrong username or email";
            }
        }
        catch(PDOException $e)
        {
            $e->getMessage();
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
                        <strong><?php echo $error; ?></strong>
                    </div>
                    <?php
                }
            }
            if(isset($loginMsg))
            {
                ?>
                <div class="alert alert-success">
                    <strong><?php echo $loginMsg; ?></strong>
                </div>
                <?php
            }
            ?>
            <h2>Login Page</h2>
            <form method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Username or Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_username_email" class="form-control" placeholder="enter username or email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label ">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="txt_password" class="form-control mb-3" placeholder="enter password" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <input type="submit" name="btn_login" class="btn btn-success mb-3" value="Login">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        You don't have a account register here? <a href="/register"><p class="text-info">Register Account</p></a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        Want to add an hike ? <a href="/newhike"><p class="text-info">ADD</p></a>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>
<?php include '../app/views/includes/footer.php' ?>