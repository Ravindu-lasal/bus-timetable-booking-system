<?php
session_start();
require 'inc.db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT admin_id, password FROM admin WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($admin && $admin['password'] === $password) {
            $_SESSION['admin_id'] = $admin['admin_id']; 
            header("Location: ../index.php");
            exit();
        } else {
            $error = "Invalid email or password.";
            header("Location: ../admin_login.php?error=" . urlencode($error));
            exit();
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>

