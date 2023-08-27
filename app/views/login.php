<?php include_once './app/helpers/helper.php' ?>

<div class="mx-auto col-10 col-md-6 col-lg-4 my-5">
    <h1 class="display-5 my-4">Login</h1>

    <?php flash('login') ?>

    <form class="d-grid gap-3" method="post" action="index.php?controller=auth&action=login">
        <input type="hidden" name="action" value="login">

        <input class="form-control " type="text" name="name/email" placeholder="Email or username">
        <input class="form-control " type="password" name="usersPwd" placeholder="Password">

        <a class="form-text" href="index.php?controller=auth&action=reset_password">
            Forgot password?
        </a>

        <button class="btn btn-dark py-2 my-2" type="submit" name="submit">Sign in</button>

        <div class="text-center">
            <p>Not a member?
                <a class="form-text" href="index.php?controller=auth&action=signup">
                    Sign Up</a>
            </p>
        </div>
    </form>
</div>