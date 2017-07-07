<?php
require_once("dbconnect.php");


function getReports(){
    $query = "SELECT reports.id,reports.issue,reports.startdate,reports.enddate,reports.details,reports.line,users.lastname,status.status
              FROM reports
              LEFT JOIN users
              ON reports.user_id = users.id
              LEFT JOIN status
              ON reports.status_id = status.id
              ORDER BY reports.id ASC";
    return connect($query);
}

function addReport($issue,$startdate,$enddate,$details,$line,$userID,$statusID) {
    $query = "INSERT INTO reports (issue,startdate,enddate,details,line,user_id,status_id)
              VALUES ('$issue','$startdate','$enddate','$details','$line','$userID','$statusID')";

    $mysqlConnection = getConnection();
    $result = mysqli_query($mysqlConnection, $query);
    closeConnection($mysqlConnection);
    return $result;
}

function getReport($idReport) {
    $query = "SELECT * FROM reports
              WHERE `id` = '$idReport'";
    return connect($query);
}

function getReportsFromList($checkList) {
    $query = "SELECT reports.id,reports.issue,reports.startdate,reports.enddate,reports.details,reports.line,users.lastname,status.status
              FROM reports
              LEFT JOIN users
              ON reports.user_id = users.id
              LEFT JOIN status
              ON reports.status_id = status.id              
              WHERE `line` IN ('$checkList')
              OR status.status IN ('$checkList')
              ORDER BY reports.id ASC";
    return connect($query);
}

function getReportsBySearch($search) {
    $query = "SELECT reports.id,reports.issue,reports.startdate,reports.enddate,reports.details,reports.line,users.lastname,status.status
              FROM reports
              LEFT JOIN users
              ON reports.user_id = users.id
              LEFT JOIN status
              ON reports.status_id = status.id              
              WHERE `issue` LIKE '%$search%'
              ORDER BY reports.id ASC";
    return connect($query);
}

function deleteReport($idReport) {
    $query = "DELETE FROM reports
              WHERE id = $idReport";

    $mysqlConnection = getConnection();
    $result = mysqli_query($mysqlConnection, $query);
    closeConnection($mysqlConnection);
    return $result;
}

function editReport($id,$issue,$startdate,$enddate,$details,$line,$statusID) {
    $query = "UPDATE reports 
              SET `issue` = '$issue',startdate = '$startdate',enddate = '$enddate',details = '$details',line = '$line', status_id = '$statusID'
              WHERE `id` = '$id'";

    $mysqlConnection = getConnection();
    $result = mysqli_query($mysqlConnection, $query);
    closeConnection($mysqlConnection);
    return $result;
}

