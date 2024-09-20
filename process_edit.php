<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $profile_picture = $_FILES['profile_picture']['name'];

    if (!empty($profile_picture)) {
        $target = "../uploads/" . basename($profile_picture);
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target);
        $query = "UPDATE users SET name = '$name', email = '$email', profile_picture = '$profile_picture' WHERE id = '$id'";
    } else {
        $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'";
    }

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "User updated successfully";
        $_SESSION['msg_type'] = "warning";
    } else {
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
        $_SESSION['msg_type'] = "danger";
    }

    header('Location: ../public/index.php');
}
