<?php
// Connect to the database
include_once 'db_connect.php';

// Fetch trainer data
$sql = "SELECT * FROM trainers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book a Personal Trainer - FitZone</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('images/jim1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px;
            background: rgba(0, 0, 0, 0.75);
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #ff5252;
        }

        .trainer-card {
            background: #222;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .trainer-card img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .trainer-card h2 {
            margin-bottom: 5px;
        }

        .booking-form {
            width: 100%;
            max-width: 400px;
            margin-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .booking-form input,
        .booking-form button {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
        }

        .booking-form input {
            background: #444;
            color: white;
        }

        .booking-form button {
            background-color: #ff5252;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .booking-form button:hover {
            background-color: #e04040;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h1>Book a Personal Trainer</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display each trainer's profile
                echo "<div class='trainer-card'>";
                echo "<img src='../uploads/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                ?>

                <!-- Booking Form for this trainer -->
                <form action="process_booking.php" method="post" class="booking-form">
                    <input type="hidden" name="trainer_id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="date" name="date" required>
                    <button type="submit" name="book_trainer">Book this Trainer</button>
                    <form action="includes/process_booking.php" method="post" class="booking-form">
                </form>
                

                </div>

                <?php
            }
        } else {
            echo "<p>No trainers found!</p>";
        }
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
