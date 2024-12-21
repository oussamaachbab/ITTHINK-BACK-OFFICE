<?php
session_start();
require_once 'config/database.php';
require_once 'includes/auth.php';

checkAdminAuth();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE users SET 
              username = '$username',
              role = '$role',
              phone = '$phone',
              email = '$email'
              WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>