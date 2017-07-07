<?php
require_once("dbconnect.php");

function getStatuses(){
    $query = "SELECT * FROM status";
    return connect($query);
}

function getStatusID($status) {
    $query = "SELECT id FROM status
              WHERE `status` = '$status'";
    return connect($query);
}