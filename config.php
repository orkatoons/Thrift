<?php
//send to ayush
$host = "localhost";
$username = "root";
$password = "";
$db_name = "thrift_hub";

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
