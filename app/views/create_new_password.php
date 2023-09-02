<?php

if (empty($_GET['selector']) || empty($_GET['validator'])) {
    echo 'Could not validate your request!';
} else {
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (ctype_xdigit($selector) && ctype_xdigit($validator)) { ?>

        <div class="mx-auto col-10 col-md-6 col-lg-4 my-5">
            <h1 class="display-5 my-4">Enter New Password</h1>

            <?php flash('newReset') ?>

            <form class="d-grid gap-3" method="post" action="index.php?controller=resetPassword&action=reset_password">
                <input type="hidden" name="action" value="validate_request">
                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">
                <div>
                    <input class="form-control" type="password" name="pwd" placeholder="Enter new password">
                    <div id="passwordHelpBlock" class="form-text">
                        <span class="text-danger">*</span>
                        Your password must be at least 6 characters long
                    </div>
                </div>
                <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat new password">
                <button class="btn btn-dark py-2 my-2" type="submit" name="submit">Submit</button>
            </form>
        </div>

<?php
    } else {
        echo 'Could not validate your request!';
    }
}
?>