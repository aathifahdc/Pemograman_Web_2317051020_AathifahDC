<?php
session_start();
include 'koneksi/db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: index.php?error=wrongpassword");
            exit();
        }
    } else {
        header("Location: index.php?error=nouser");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>