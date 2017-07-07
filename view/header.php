<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/reports_manager/assets/style.css" rel="stylesheet">
</head>
<body>
<div class="page">
    <header>
        <div class="container">
            <h1 id="logo">REPORTS<br>MANAGER</h1>
            <div class="nav">
                <ul>
                    <li><a href="/reports_manager/view/reports.php">Reports</a></li>
                    <li><a href="/reports_manager/view/addReport.php">Add report</a></li>
                </ul>
            </div>

            <?php
                if(!empty($_SESSION['lastName'])) {
            ?>
                <div class="nav">
                    <p>Welcome, <?= ucfirst($_SESSION['lastName']) ?></p>
                    <a href='logout.php'>Logout</a>
                </div>
            <?php } else { ?>
                <div class="nav">
                    <ul>
                        <li class="pull-right"><a href="/reports_manager/view/register.php">Sign Up</a></li>
                        <li class="pull-right"><a href="/reports_manager/view/login.php"><i class="sprite sprite_menu_user_small"></i>Login</a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </header>

