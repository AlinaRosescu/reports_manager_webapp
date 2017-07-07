<?php

if(!isset($_SESSION['lastName']) ||
    (trim($_SESSION['lastName']) == '')) {
    header("Location: ../index.php");
    exit();
}