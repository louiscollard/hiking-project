<?php
include "../app/views/includes/header.php";
include_once ("/application/app/models/database_connection.php");
include_once ("/application/app/models/database_hikes.php");
$hike = new databaseHikes();
$id = $_GET["q"];
?>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 g-1">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1596236560389-cf51eab0d31f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" class="img-fluid" alt="hiking">
                    <div class="card-body">
                        <h4 class="card-text">Name : <?php echo $hike->getOneHikeName($id)?></h4>
                        <p class="card-text">Description : <?php echo $hike->getOneHikeDescription($id)?></p>
                        <p class="card-text">Distance : <?php echo $hike->getOneHikeDistance($id)?> km</p>
                        <p class="card-text">Duration : <?php echo $hike->getOneHikeDuration($id)?></p>
                        <p class="card-text">Elevation : <?php echo $hike->getOneHikeElevationGain($id)?> m</p>
                        <p class="card-text">Creation date : <?php echo $hike->getOneHikeCreationDate($id)?></p>
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm btn-outline-success me-2">Tags</button>
                            <button type="button" class="btn btn-sm btn-outline-success">Tags</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../app/views/includes/footer.php" ?>
