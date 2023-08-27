<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Project</title>
    <link rel="icon" type="image/x-icon" href="/public/images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/public/images/fighter-jet.png" alt="Logo" width="50" height="50" class="d-inline-block mx-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarColor01">
                <ul class="navbar-nav mb-2 mb-lg-0 py-4 gap-3">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=auth&action=reset_password">Reset password</a>
                    </li> -->

                    <?php if (isset($_SESSION['usersId'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=home&action=index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=home&action=play">Game</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=home&action=profile">Profile</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex">
                    <?php if (!isset($_SESSION['usersId'])) : ?>
                        <a href="index.php?controller=auth&action=signup">
                            <li class="btn btn-dark mx-2">Sign Up</li>
                        </a>
                        <a href="index.php?controller=auth&action=login">
                            <li class="btn btn-outline-light px-4">Login</li>
                        </a>
                    <?php else : ?>
                        <a href="logout.php">
                            <li class="btn btn-outline-light px-3">
                                <span class="mx-1">Logout</span>
                                <i class="bi bi-box-arrow-right"></i>
                            </li>
                        </a>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
    </nav>

    <!-- closing in the footer -->
    <div class="container pt-4">