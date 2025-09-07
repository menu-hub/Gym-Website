<?php
session_start();
require_once "db_connect.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $query = "SELECT * FROM staff WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $staff = $result->fetch_assoc();
            if ($staff['password'] === $password) {
                $_SESSION['staff_id'] = $staff['id'];
                $_SESSION['staff_username'] = $staff['username'];
                header("Location: staff_dashboard.php");
                exit;
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "Staff not found.";
        }
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Login</title>
    <style>
        body {
            background: url('images/jym.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }
        .login-box {
            width: 350px;
            margin: 80px auto;
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 12px;
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #28a745;
            border: none;
            color: white;
            border-radius: 6px;
            font-weight: bold;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Staff Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </form>
</div>
</body>
</html>
