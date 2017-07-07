<?php
session_start();
session_unset();
session_destroy();
header ("Location: /reports_manager/index.php");