<a class="btn btn-lg px-0 my-3" href="index.php">
    <i class="bi bi-arrow-left"></i>
    Back to Home
</a>

<p class="fs-3">Profile Settings</p>
<p class="fs-5"><?php echo $_SESSION['usersName'] ?></p>
<form>
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?php echo $_SESSION['usersEmail']; ?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION['usersUid'] ?>">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6 col-md-8">
            <label for="currentPassword" class="form-label">Current Password</label>
            <input type="password" id="currentPassword" class="form-control" placeholder="Enter your current password" autocomplete="off">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8">
            <label for="newPassword" class="form-label">New Password</label>
            <input type="password" id="newPassword" class="form-control" placeholder="Enter new password" aria-describedby="passwordHelpBlock" autocomplete="off">
            <div id="passwordHelpBlock" class="form-text">
                <span class="text-danger">*</span>
                Your password must be at least 6 characters long
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8">
            <label for="repeatPassword" class="form-label">Repeat Password</label>
            <input type="password" id="repeatPassword" class="form-control" placeholder="Repeat new password" autocomplete="off">
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-6 col-md-8 mt-2">
            <div class="d-grid gap-3 d-md-flex justify-content-end">
                <input type="submit" class="btn btn-dark px-5" value="Submit">
            </div>
        </div>
    </div>
</form>