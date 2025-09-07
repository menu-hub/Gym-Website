<?php
session_start(); // Start the session

include 'header.php';
include 'db_connect.php';

// Check if customer is logged in
if (!isset($_SESSION['customer_id'])) {
    echo "<p style='color:red;'>You must be logged in to view your dashboard.</p>";
    exit;
}

$customer_id = $_SESSION['customer_id'];

// Fetch customer details
$customerQuery = $conn->query($sql = "SELECT * FROM customer WHERE customer_id = $customer_id");
$customer = $customerQuery->fetch_assoc();

// Fetch personal training bookings
$personalTrainingQuery = $conn->query("
SELECT t.name, b.booking_date
FROM trainers t
JOIN bookings b ON t.id = b.trainer_id
WHERE b.customer_id = $customer_id
");


// Fetch class bookings
$classQuery = $conn->query("
 SELECT c.class_name, b.booking_date
FROM classes c
JOIN booking_class b ON c.id = b.class_id
WHERE b.customer_id = $customer_id
");

// Fetch memberships
$membershipQuery = $conn->query("
  SELECT m.plan_name, r.plan_id
FROM memberships m
JOIN membership_requests r ON m.plan_id = r.plan_id
WHERE r.customer_id = $customer_id

");
?>

<div class="customer-dashboard">
    <div class="profile">
        <h2>Customer Profile</h2>
        <p>Name: <?= $customer['name'] ?></p>
        <p>Email: <?= $customer['email'] ?></p>
        <p>Phone: <?= $customer['phone'] ?></p>
    </div>

    <div class="section">
        <h2>Your Personal Training Bookings</h2>
        <?php while ($row = $personalTrainingQuery->fetch_assoc()) { ?>
            <div class="info">
                <p>Trainer: <?= $row['name'] ?></p>
                <p>Date: <?= $row['booking_date'] ?></p>
            </div>
        <?php } ?>
    </div>

    <div class="section">
        <h2>Your Class Bookings</h2>
        <?php while ($row = $classQuery->fetch_assoc()) { ?>
            <div class="info">
                <p>Class: <?= $row['class_name'] ?></p>
                <p>Date: <?= $row['booking_date'] ?></p>
            </div>
        <?php } ?>
    </div>

    <div class="section">
        <h2>Your Membership</h2>
        <?php while ($row = $membershipQuery->fetch_assoc()) { ?>
            <div class="info">
                <p>Membership Plan: <?= $row['plan_name'] ?></p>
                
            </div>
        <?php } ?>
    </div>

    <div class="links">
        <a href="book_trainer.php">Book Personal Training</a>
        <a href="group_classes.php">Join a Class</a>
        <a href="membership_form.php">Get Membership</a>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>
body {
    background: url('images/jim1.jpg') no-repeat center center fixed;
    background-size: cover;
  
    font-family: Arial, sans-serif;
    margin: 0;
}
    .customer-dashboard {
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    .profile, .section {
        margin-bottom: 20px;
    }

    .profile h2, .section h2 {
        color: black;
    }

    .info {
        margin: 10px 0;
        padding: 10px;
        background-color: white;
        border-radius: 5px;
        
    }

    .links a {
        display: inline-block;
        padding: 10px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        margin: 5px;
        border-radius: 5px;
    }

    .links a:hover {
        background-color: #2980b9;
    }
</style>
