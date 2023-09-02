<div class="mx-auto col-10 col-md-6 col-lg-4 my-5">
    <h1 class="display-5 my-4">Sign Up</h1>

    <?php flash('register') ?>

    <form class="d-grid gap-3" method="post" action="index.php?controller=auth&action=signup">
        <input type="hidden" name="action" value="register">

        <input class="form-control" type="text" name="usersName" placeholder="Name" autocomplete="name">
        <input class="form-control" type="text" name="usersEmail" placeholder="Email" autocomplete="email">
        <div>
            <input class="form-control" type="text" name="usersUid" placeholder="Username" autocomplete="off">
            <small id="uidHelp" class="form-text text-secondary px-1">
                <span class="text-danger">*</span>
                Username can only contain alphanumeric characters
            </small>
            <input class="form-control mt-2" type="password" name="usersPwd" placeholder="Password">
            <small id="pwdHelp" class="form-text text-secondary px-1">
                <span class="text-danger">*</span>
                Password must be at least 6 characters long
            </small>
            <input class="form-control mt-2" type="password" name="pwdRepeat" placeholder="Repeat password">
        </div>
        <button class="btn btn-dark py-2 my-1" type="submit" name="submit">Sign Up</button>
        <div class="text-center">
            <p>Already a user?
                <a class="form-text" href="index.php?controller=auth&action=login">
                    Login</a>
            </p>
        </div>
    </form>
</div>