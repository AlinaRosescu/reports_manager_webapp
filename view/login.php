<?php

session_start();
require_once(dirname(__FILE__) . "/header.php");
require_once(dirname(__FILE__) . "/../model/db_user.php");
require_once(dirname(__FILE__) . "/../model/db_report.php");

if(!empty($_POST)){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $emailDB = getUser($email);

    if(!empty($_POST['login'])) {
        if ($email && $email == $emailDB['email']) {
            if ($pass == $emailDB['password']) {
                $_SESSION['lastName'] = $emailDB['lastname'];
                $_SESSION['id'] = $emailDB['id'];
                if(getReports()) {
                    header("Location: reports.php");
                } else {
                    header("Location: addReport.php");
                }
                exit();
            } else {
                $errors['password'] = "Wrong password";
            }
        } else {
            $errors['email'] = "There is no user with this email";
        }
    }
}
?>

<div class="box">
    <div class="loginBox">
        <form method="post" action="">
            <h2>Login to your account</h2>
            <?php
            if(!empty($errors['email'])) { ?>
                <span style='display:block;color: red;font-size: 14px;padding-left:50px;'><?=$errors['email'] ?></span>
            <?php } ?>
            <label for="email">
                <i class="fa fa-user icon" aria-hidden="true"></i><input type="text" name="email" value="" placeholder="Email" />
            </label>

            <?php
            if(!empty($errors['password'])) { ?>
                <span style='display:block;color: red;font-size: 14px;padding-left:50px;'><?=$errors['password']?></span>
            <?php } ?>
            <label for="password">
                <i class="fa fa-key icon" aria-hidden="true"></i><input type="password" id="password" name="password" value="" placeholder="Password" />
            </label>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</div>

<?php
require_once(dirname(__FILE__) . "/footer.php");
?>