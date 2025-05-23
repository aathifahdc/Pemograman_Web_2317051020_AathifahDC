<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "datauser";

$conn = new mysqli($host, $user, $password, $db);

if (!$conn) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connected successfully";
}

?>

