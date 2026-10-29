<?php
$server = "localhost";
$username = "root";
// $password = null; 
$password = "";
$database = "discuss";

$conn = new mysqli($server, $username, $password, $database);

if($conn->connect_error){
    die("database not connected" . $conn->connect_error);
}

// echo"connected <br>";

?>