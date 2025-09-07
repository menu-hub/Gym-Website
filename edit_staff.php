<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}

require_once "db_connect.php";

if (!isset($_GET['id'])) {
    die("Staff ID not provided.");
}

$id = $_GET['id'];

// Fetch current staff data
$stmt = $conn->prepare("SELECT * FROM staff WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$staff = $result->fetch_assoc();
$stmt->close();

if (!$staff) {
    die("Staff not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $staff['password'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE staff SET username=?, password=?, name=?, role=? WHERE id=?");
    $stmt->bind_param("ssssi", $username, $password, $name, $role, $id);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error updating staff: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Staff</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-image: url('gym.jpg'); background-size: cover; background-position: center;">
    <div class="edit-staff-container">
        <h2>Edit Staff</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $staff['username']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password (leave blank to keep current):</label>
                <input type="password" name="password">
            </div>
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="name" value="<?php echo $staff['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <input type="text" name="role" value="<?php echo $staff['role']; ?>" required>
            </div>
            <button type="submit">Update Staff</button>
        </form>
        <br>
        <a href="admin_dashboard.php">? Back to Dashboard</a>
    </div>
</body>
</html>
