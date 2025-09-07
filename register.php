<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>

    <title>Customer Registration</title>
    <style>
        body {
            background-image: url('images/jim1.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .register-container {
            width: 400px;
            margin: 100px auto;
            background: rgba(0,0,0,0.7);
            padding: 30px;
            border-radius: 10px;
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #28a745;
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
<div class="register-container">
    <h2>Customer Registration</h2>
    <form action="process_register.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="submit" name="register" value="Register">
    </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
