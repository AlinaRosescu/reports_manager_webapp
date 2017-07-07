<?php
require_once("dbconnect.php");

function getUsers() {
    $query = "SELECT * FROM users";

    $mysqlConnection = getConnection();
    $users = mysqli_query($mysqlConnection, $query);
    closeConnection($mysqlConnection);

    if($users){
        return mysqli_fetch_all($users, MYSQLI_ASSOC);
    }
    else{
        return array();
    }
}


function getUser($email){
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";

    $mysqlConnection = getConnection();
    $result = mysqli_query($mysqlConnection, $query);

    closeConnection($mysqlConnection);

    if($result){
        $result = mysqli_fetch_assoc($result);
    }
    else{
        $result = array();
    }
    return $result;
}

function getUserID($email){
    $query = "SELECT id FROM `users` WHERE `email` = '$email'";

    $mysqlConnection = getConnection();
    $result = mysqli_query($mysqlConnection, $query);

    closeConnection($mysqlConnection);

    if($result){
        $result = mysqli_fetch_assoc($result);
    }
    else{
        $result = array();
    }
    return $result;
}

function addUser($firstName, $lastName, $email, $pass) {
    $pass = md5($pass);
    $query = "INSERT INTO `users` (firstname,lastname,email,password) 
              VALUES ('$firstName','$lastName','$email','$pass')";

    $mysqlConnection = getConnection();
    $user = mysqli_query($mysqlConnection, $query);
    if(!$user) {
        return mysqli_error($mysqlConnection);
    } else {
        closeConnection($mysqlConnection);
        return $user;
    }

}
