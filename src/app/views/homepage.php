<?php
include "includes/header.php";
include_once ("/application/app/models/database_connection.php");
include_once ("/application/app/models/database_hikes.php");
$hikes = new databaseHikes();
?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Find your next hike</h1>
                <form class="d-flex " role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <!--<img src="https://images.unsplash.com/photo-1599423423927-a2c777b40faa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2338&q=80" class="img-fluid" alt="hiking">-->
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($hikes->getAllHikes() as $key => $hike) {?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://images.unsplash.com/photo-1596236560389-cf51eab0d31f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" class="img-fluid" alt="hiking">
                        <div class="card-body">
                            <h4 class="card-text"><?php echo $hike["Name"]?></h4>
                            <p class="card-text"><?php echo $hike["Description"]?></p>
                            <div class="d-flex mb-3">
                                <button type="button" class="btn btn-sm btn-outline-success me-2">Hard</button>
                                <button type="button" class="btn btn-sm btn-outline-success">Rock</button>
                            </div>
                            <a href="/learnmore?q=<?php echo $hike["Id"] ?>" class="btn btn-success">Learn More</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

<?php include "includes/footer.php"; ?>