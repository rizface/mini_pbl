<?php

/** 
 * Create new connection to mysql
 * @return {mysqli | boolean} 
 */ 
function createConnection() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "lab";

    $conn = mysqli_connect($host,$username,$password,$database);
    return $conn;
}