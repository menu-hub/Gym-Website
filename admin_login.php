<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'header.php'; ?>
    <title>Admin Login - FitZone</title>
    <style>
        body {
            background-image: url('images/jym.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .login-box {
            background: rgba(255,255,255,0.9);
            padding: 30px;
            margin: 80px auto;
            width: 300px;
            box-shadow: 0px 0px 10px #333;
            border-radius: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
        button {
            padding: 10px;
            width: 100%;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form action="process_admin_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
