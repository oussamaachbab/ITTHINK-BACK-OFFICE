<?php
function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
}

function checkAdminAuth() {
    checkAuth();
    if ($_SESSION['role'] !== 'admin') {
        header('Location: unauthorized.php');
        exit();
    }
}
?>