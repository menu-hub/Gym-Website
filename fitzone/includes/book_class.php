<?php
// book_class.php

include('header.php'); // Include header

// Connect to the database
include('db_connect.php'); // Make sure your DB connection is established here

// Get the class ID from the URL
$class_id = $_GET['class_id'];

// Fetch the class details based on the class ID
$query = "SELECT c.class_name, c.class_description, c.class_image, t.name AS trainer_name 
          FROM classes c
          JOIN trainers t ON c.trainer_id = t.id
          WHERE c.id = $class_id";
$result = $conn->query($query);
$class = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Class - FitZone Fitness Center</title>
    <style>
        /* Styles for Book Class Page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .book-class-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .book-class-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .class-info {
            text-align: center;
            margin-bottom: 30px;
        }

        .class-info img {
            max-width: 100%;
            border-radius: 10px;
            height: 300px;
            object-fit: cover;
        }

        .class-info h3 {
            margin-top: 15px;
            color: #333;
        }

        .class-info p {
            color: #777;
            margin-top: 10px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container input, .form-container select, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-container input[type="submit"] {
            background-color: #ff6b6b;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #ff5252;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<!-- Book Class Section -->
<div class="book-class-container">
    <h2>Join Your Class</h2>

    <div class="class-info">
        <img src="images/<?php echo $class['class_image']; ?>" alt="<?php echo $class['class_name']; ?>">
        <h3><?php echo $class['class_name']; ?></h3>
        <p>Instructor: <?php echo $class['trainer_name']; ?></p>
        <p><?php echo $class['class_description']; ?></p>
    </div>

    <div class="form-container">
        <form action="process_join.php" method="POST">
            <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <textarea name="special_requests" placeholder="Special Requests (Optional)"></textarea>
            <button type="submit" name="book_class">Join Now</button>
            <form action="process_join.php" method="post" class="booking-form">
        </form>
    </div>
</div>

<?php
include('footer.php'); // Include footer
?>

</body>
</html>
