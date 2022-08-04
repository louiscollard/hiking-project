<?php
include "../app/views/includes/header.php";
require_once 'connection.php';

if(isset($_GET["Id"])){
    //$Id = mysqli_real_escape_string($db, $_GET["Id"]);

    //$select_stmt=$db->prepare("SELECT name,creation_date,distance,duration,elevation_gain,description FROM hikes WHERE id='$Id' ");// sql select query
    //$select_stmt->execute(array(':uname'=>$name, ':udistance'=>$distance)); //execute query
    //$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1596236560389-cf51eab0d31f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" class="img-fluid" alt="hiking">
                    <div class="card-body">
                        <h4 class="card-text"><?php echo $row["name"]?></h4>
                        <p class="card-text"><?php echo $row["description"]?></p>
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm btn-outline-success">Tags</button>
                            <button type="button" class="btn btn-sm btn-outline-success">Tags</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../app/views/includes/footer.php" ?>
