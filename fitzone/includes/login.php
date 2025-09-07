<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>
    <style>
        body {
            background-image: url('images/jim1.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .login-container {
            width: 400px;
            margin: 100px auto;
            background: rgba(0,0,0,0.7);
            padding: 30px;
            border-radius: 10px;
        }
        .login-container h2 {
            text-align: center;
        }
        input[type=email], input[type=password] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Customer Login</h2>
    <form action="process_login.php" method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
