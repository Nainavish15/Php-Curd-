<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'crud_app';

// Create MySQLi connection
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
