<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['customer_id'])) {
    die("You must be logged in to book a session.");
}

$trainer_id = $_POST['trainer_id'];
$customer_id = $_SESSION['customer_id'];

$sql = "INSERT INTO bookings (trainer_id, customer_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $trainer_id, $customer_id);

if ($stmt->execute()) {
    echo "Booking successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<a href="book_trainer.php">Back to Booking Page</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="style.css"> <!-- Make sure you link the CSS properly -->
</head>

<body>
<?php include 'header.php'; ?>
    <div class="booking-form-container">
        <h2>Book a Personal Trainer</h2>
        
        <?php
            if (isset($message)) {
                echo $message; // Display success/error message
            }
        ?>
         </div>
         <?php include 'footer.php'; ?>
</body>
</html>