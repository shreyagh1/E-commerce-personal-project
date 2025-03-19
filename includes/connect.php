<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = "";      
$dbname = "ecommerce_db";

$conn = new mysqli("127.0.0.1", "root", "", "ecommerce_db", 3307);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
