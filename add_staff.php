<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}

require_once "db_connect.php"; // Include your DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Insert into staff table
    $stmt = $conn->prepare("INSERT INTO staff (username, password, name, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $name, $role);

    if ($stmt->execute()) {
        echo "New staff member added successfully!";
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staff</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-image: url('your-image.jpg'); background-size: cover; background-position: center;">
    <div class="add-staff-container">
        <h2>Add New Staff Member</h2>
        <form action="add_staff.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" name="role" required>
            </div>

            <button type="submit">Add Staff</button>
        </form>
        <br>
        <a href="admin_dashboard.php">? Back to Dashboard</a>
    </div>
</body>
</html>
