<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $target = "../uploads/" . basename($profile_picture);

    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target);

    $query = "INSERT INTO users (name, email, profile_picture) VALUES ('$name', '$email', '$profile_picture')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "User added successfully";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
        $_SESSION['msg_type'] = "danger";
    }

    header('Location: ../public/index.php');
}
