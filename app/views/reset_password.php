<div class="mx-auto col-10 col-md-6 col-lg-4 my-5">
    <h1 class="display-5 my-4">Reset Password</h1>

    <?php flash('reset') ?>

    <form class="d-grid gap-3" method="post" action="index.php?controller=resetPassword&action=reset_password">
        <input type="hidden" name="action" value="sendEmail">
        <input class="form-control" type="text" name="usersEmail" placeholder="Enter your email">
        <button class="btn btn-dark py-2 my-2" type="submit" name="submit">Reset password</button>
    </form>
</div>