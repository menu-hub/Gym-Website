<?php
include_once 'db_connect.php';

if ($conn) {
    echo "Database connected successfully.";
} else {
    echo "Database connection failed.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Training - FitZone</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .trainer-section {
            background-image: url('images/gym.jpg'); /* Make sure this file exists */
            background-size: cover;
            background-position: center;
            padding: 80px 20px;
            color: #fff;
            text-align: center;
            min-height: 100vh;
        }

        .trainer-section h2 {
            font-size: 40px;
            margin-bottom: 40px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .trainers-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .trainer-card {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
            transition: transform 0.3s ease;
        }

        .trainer-card:hover {
            transform: scale(1.05);
        }

        .trainer-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .trainer-card h3 {
            color: #ffd700;
            margin: 15px 0 10px;
        }

        .trainer-card p {
            font-size: 14px;
            color: #eee;
        }

        .book-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
        }

        .book-btn:hover {
            background-color: #e44a4a;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<section class="trainer-section">
    <h2>Meet Our Personal Trainers</h2>
    <div class="trainers-container">
        <?php
        $sql = "SELECT * FROM trainers LIMIT 3";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = htmlspecialchars($row['name']);
                $desc = htmlspecialchars($row['description']);
                $img = htmlspecialchars($row['image']);

                echo "
                <div class='trainer-card'>
                    <img src='images/$img' alt='$name'>
                    <h3>$name</h3>
                    <p>$desc</p>
                    <a href='book_trainer.php' class='book-btn'>Book Now</a>
                </div>";
            }
        } else {
            echo "<p>No trainers found.</p>";
        }
        ?>
    </div>
</section>

<?php include 'footer.php'; ?>
</body>
</html>
