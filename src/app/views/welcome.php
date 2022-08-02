<?php

require_once "/application/app/models/Database.php";
include "/application/app/views/includes/header.php";
$db = new databaseConnection();

?>
<div class="wrapper">
    <div class="container">
        <div class="col-lg-12">
                <h2>
                    <?php

                    session_start();

                    if(!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
                    {
                        header("location: home");
                    }

                    $id = $_SESSION['user_login'];

                    $select_stmt = $db->getDatabase()->prepare("SELECT * FROM users WHERE id=:uid");
                    $select_stmt->execute(array(":uid"=>$id));

                    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

                    if(isset($_SESSION['user_login']))
                    {
                        ?>
                        Welcome,
                        <?php
                        echo $row['firstname'];
                    }
                    ?>
                </h2>
                <a href="logout.php">Logout</a>
        </div>

    </div>
</div>
<?php include "/application/app/views/includes/footer.php" ?>