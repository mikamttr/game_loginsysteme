<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fighter plane</title>
    <link rel="icon" type="image/x-icon" href="/public/images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/public/images/fighter-jet.png" alt="Logo" width="50" height="50" class="d-inline-block mx-2">
            </a>

            <div class="d-flex">
                <?php if (!isset($_SESSION['usersId'])) : ?>
                    <a href="index.php?controller=auth&action=signup">
                        <li class="btn btn-dark mx-2">Sign Up</li>
                    </a>
                    <a href="index.php?controller=auth&action=login">
                        <li class="btn btn-outline-light px-4">Login</li>
                    </a>
                <?php else : ?>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-5 bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="index.php?controller=game&action=home">
                                    <i class="bi bi-house mx-1"></i> Home</a>
                            </li>
                            <li><a class="dropdown-item" href="index.php?controller=game&action=profile">
                                    <i class="bi bi-person mx-1"></i> Profile</a>
                            </li>
                            <li class="px-3">
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">
                                    <i class="bi bi-box-arrow-right mx-1"></i> Logout</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
    </nav>

    <!-- closing in the footer -->
    <div class="container pt-4">