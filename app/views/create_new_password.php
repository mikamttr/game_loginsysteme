<?php

if (empty($_GET['selector']) || empty($_GET['validator'])) {
    echo 'Could not validate your request!';
} else {
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (ctype_xdigit($selector) && ctype_xdigit($validator)) { ?>
        <?php
        include_once 'app/view/_template/header.php';
        include_once './helpers/session_helper.php';
        ?>

        <div class="mx-auto col-10 col-md-6 col-lg-4 my-5">
            <h1 class="display-5 my-4">Enter New Password</h1>

            <?php flash('newReset') ?>

            <form class="d-grid gap-3" method="post" action="./controllers/ResetPasswords.php">
                <input type="hidden" name="type" value="reset" />
                <input type="hidden" name="selector" value="<?php echo $selector ?>" />
                <input type="hidden" name="validator" value="<?php echo $validator ?>" />
                <input class="form-control" type="password" name="pwd" placeholder="Enter new password">
                <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat new password">
                <button class="btn btn-dark py-2 my-2" type="submit" name="submit">Submit</button>
            </form>
        </div>

        <?php
        include_once 'app/view/_template/footer.php'
        ?>

<?php
    } else {
        echo 'Could not validate your request!';
    }
}
?>