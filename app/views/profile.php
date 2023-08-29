<a class="btn btn-lg px-0 my-3" href="index.php">
    <i class="bi bi-arrow-left"></i>
    Back to Home
</a>


<form action="">
    <div>bests scores</div>
    <div>Username</div>

    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" placeholder="<?php echo explode(" ", $_SESSION['usersName'])[0]; ?>">

    <label for="surname" class="form-label">Surname</label>
    <input type="text" class="form-control" id="surname" placeholder="<?php echo explode(" ", $_SESSION['usersName'])[1]; ?>">

    <div>email</div>
</form>