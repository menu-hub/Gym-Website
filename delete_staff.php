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

// Delete staff
$stmt = $conn->prepare("DELETE FROM staff WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Error deleting staff: " . $stmt->error;
}

$stmt->close();
?>
