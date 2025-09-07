<?php
require_once "db_connect.php";
$id = $_GET['id'];

// Check if trainer is assigned to any classes
$stmt_check = $conn->prepare("SELECT COUNT(*) FROM classes WHERE trainer_id = ?");
$stmt_check->bind_param("i", $id);
$stmt_check->execute();
$stmt_check->bind_result($count);
$stmt_check->fetch();
$stmt_check->close();

if ($count > 0) {
    echo "Cannot delete trainer. They are assigned to one or more classes.";
    exit;
}

// Safe to delete
$stmt = $conn->prepare("DELETE FROM trainers WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: admin_dashboard.php");
exit;
?>
