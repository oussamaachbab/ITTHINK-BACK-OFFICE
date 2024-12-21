<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $role = 'user'; 

    $errors = [];

    if (empty($username)) {
        $errors[] = "Username is required";
    } else {
        $stmt = mysqli_prepare($conn, "SELECT user_id FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = "Username already exists";
        }
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password, email, phone, role) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $username, $hashed_password, $email, $phone, $role);
        
        if (mysqli_stmt_execute($stmt)) {
            $user_id = mysqli_insert_id($conn);
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';
            
            header('Location: dashboard.php');
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }

    if (!empty($errors)) {
        $_SESSION['signup_errors'] = $errors;
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>