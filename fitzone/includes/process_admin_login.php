<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $_SESSION['admin_username'] = $username;
        header("Location:admin_dashboard.php");
    } else {
        echo "Invalid login. <a href='admin_login.php'>Try again</a>";
    }
}
?>
