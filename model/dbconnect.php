<?php

function getConnection() {
    $link = mysqli_connect("localhost", "root", "auximus", "reports");
    return $link;
}

function connect($query) {
    $link = getConnection();
    $result = mysqli_query($link, $query);

    if($result){
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else{
        return array();
    }
}

function closeConnection($link){
    mysqli_close($link);
}