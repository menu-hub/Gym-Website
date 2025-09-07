<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['customer_id'])) {
    die("You must be logged in to book a class.");
}

$class_id = $_POST['class_id'];
$customer_id = $_SESSION['customer_id'];

$sql = "INSERT INTO booking_class (class_id, customer_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $class_id, $customer_id);

if ($stmt->execute()) {
    echo "Class booked successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
