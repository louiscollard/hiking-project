<?php
include "../app/views/includes/header.php";
include_once ("/application/app/models/database_connection.php");
include_once ("/application/app/models/database_hikes.php");
include_once ("/application/app/models/database_user.php");
$hikes = new databaseHikes();
$Id = $_GET["q"];

require_once 'connection.php';
$id = $_SESSION['user_login'];

$select_stmt = $db->prepare("SELECT * FROM users WHERE id=:uid");
$select_stmt->execute(array(":uid"=>$id));

$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
?>
    <section class="card container mt-5 mb-5" style="width: 77%;">
        <div class="row row-cols-1 g-1">
            <div class="col-md-4">
                <img src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">Your details : </h3>
                    <h4 class="card-text">Firstname : <?php echo $row['firstname']?></h4>
                    <h4 class="card-text">Lastname : </h4>
                    <h4 class="card-text">Email : <?php echo $row['email']?></h4>
                </div>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="d-grid gap-2 mb-3">
                <a class="btn btn-success" href="/newhike?id=<?php echo $_SESSION['user_login'] ?>">ADD</a>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($hikes->getAllHikesPersoUser($id) as $key => $hike) {?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="https://images.unsplash.com/photo-1596236560389-cf51eab0d31f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" class="img-fluid" alt="hiking">
                            <div class="card-body">
                                <h4 class="card-text"><?php echo $hike["Name"]?></h4>
                                <p class="card-text"><?php echo $hike["Description"]?></p>
                                <div class="d-flex mb-2">
                                    <button type="button" class="btn btn-sm btn-outline-success me-2">Tags</button>
                                    <button type="button" class="btn btn-sm btn-outline-success">Tags</button>
                                </div>
                                <!--
                                <a class="btn btn-success me-2" href="/update">Update</a>
                                <a class="btn btn-danger" href="/delete">Delete</a>-->

                                <a href="/delete?q=<?php echo $hike["Id"] ?>" class="btn btn-danger me-2">Delete</a>
                                <a href="/update?q=<?php echo $hike["Id"]?>&FormName=<?php echo $hike["Name"]?>&Formcrea=<?php echo $hike["CreationDate"]?>&Formdesc=<?php echo $hike["Description"]?>&Formdist=<?php echo $hike["Distance"]?>&Formdur=<?php echo $hike["Duration"]?>&Formelevation=<?php echo $hike["Elevation"]?>" class="btn btn-success">Update</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
<?php include "../app/views/includes/footer.php" ?>