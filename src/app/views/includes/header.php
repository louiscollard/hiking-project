<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <title>Hiking-Project</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Hiking Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Hikes</a>
                    </li>
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>-->
                </ul>
                <form class="d-flex" role="search">
                    <?php if(isset($_SESSION['user_login'])) : ?>
                        <a class="btn btn-success me-2" href="/userhome"><?php echo "My page"?></a>
                        <a class="btn btn-outline-success" href="/logout">Logout</a>
                    <?php elseif(isset($_SESSION['admin_login'])): ?>
                        <a class="btn btn-success me-2" href="/admin"><?php echo "ADMIN page"?></a>
                        <a class="btn btn-outline-success" href="/logout">Logout</a>
                    <?php else:?>
                        <a class="btn btn-success me-2" href="/login">Login</a>
                        <a class="btn btn-outline-success" href="/register">Register</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </nav>