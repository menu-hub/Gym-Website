<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['customer_id'])) {
    die("You must be logged in to submit a membership request.");
}

$customer_id = $_SESSION['customer_id'];
$plan_id = $_POST['plan_id'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO membership_requests (plan_id, customer_id, full_name, email, phone) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sisss", $plan_id, $customer_id, $full_name, $email, $phone);

if ($stmt->execute()) {
    echo "Membership request submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
