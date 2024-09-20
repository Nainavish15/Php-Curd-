<?php
session_start();
include '../config/db.php';

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    $_SESSION['message'] = "User deleted successfully";
    $_SESSION['msg_type'] = "danger";
} else {
    $_SESSION['message'] = "Error: " . mysqli_error($conn);
    $_SESSION['msg_type'] = "danger";
}

header('Location: ../public/index.php');
