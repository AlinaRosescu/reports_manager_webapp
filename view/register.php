<?php

session_start();
require_once(dirname(__FILE__) . "/header.php");
require_once(dirname(__FILE__) . "/../model/db_user.php");
require_once(dirname(__FILE__) . "/../model/db_report.php");

if(!empty($_POST)){
    $firstName  = $_POST['firstName'];
    $lastName  = $_POST['lastName'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $emailDB = getUser($email);

    if(!empty($_POST['register'])) {
        if ($email && $email == $emailDB['email']) {
            $errors['email'] = "There is already a user with this email";
        } else {
            addUser($firstName,$lastName,$email,$pass);
            $_SESSION['lastName'] = $_POST['lastName'];
            $_SESSION['id'] = $emailDB['id'];
            if(getReports()) {
                header("Location: reports.php");
            } else {
                header("Location: addReport.php");
            }
            exit();
        }
    }
}

?>
<div class="box">
    <div class="registerBox">
        <form method="post" action="">
            <h2>Create account</h2>
            <label for="firstName">
                <span>First Name</span>
                <input type="text" id="firstName" name="firstName" value="" placeholder="First Name" />
            </label>

            <label for="lastName">
                <span>Last Name</span>
                <input type="text" id="lastName" name="lastName"  placeholder="Last Name" />
            </label>

            <?php
            if(!empty($errors['email'])) { ?>
                <span style='display:block;color: red;font-size: 14px;padding-left:120px;'><?=$errors['email']?></span>
            <?php } ?>
            <label for="email">
                <span>Email</span>
                <input type="email" id="email" name="email" value="" placeholder="Email" />
            </label>
            
            <label for="pass">
                <span>Password</span>
                <input type="password" id="pass" name="password" value="" placeholder="Password" />
            </label>

            <input type="submit" name="register" value="Register">
        </form>
    </div>
</div>
<?php
require_once(dirname(__FILE__) . "/footer.php");
?>