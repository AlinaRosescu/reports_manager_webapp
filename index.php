<?php
@session_start();
require_once(dirname(__FILE__) . "/view/header.php");
require_once(dirname(__FILE__) . "/model/db_user.php");


if($_SESSION['firstName']) {
    header("Location: view/reports.php");
} else {
    if(getUsers()) {
        header("Location: view/login.php");
    } else {
        header("Location: view/register.php");
    }
    exit();
}

require_once(dirname(__FILE__) . "/view/footer.php");