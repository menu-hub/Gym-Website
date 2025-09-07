<?php
// group_classes.php

include('header.php'); // Include header at the top of the page

// Connect to the database
include('db_connect.php'); // Make sure your DB connection is established here

// Query to fetch all classes and trainer details
$query = "SELECT c.id, c.class_name, c.class_description, c.class_image, t.name AS trainer_name 
          FROM classes c
          JOIN trainers t ON c.trainer_id = t.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Classes - FitZone Fitness Center</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to your external CSS file -->
</head>
<style>
body {
    background: url('images/staff.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
}
/* Styles for Group Classes Page */
.classes-container {
    text-align: center;
    padding: 50px 0;
    background-color: #f8f9fa;
}

.classes-container h2 {
    font-size: 2.5rem;
    margin-bottom: 40px;
    color: #333;
}

.classes-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    justify-items: center;
}

.class-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 100%;
    max-width: 350px;
    text-align: center;
}

.class-card img {
    width: 100%;
    border-radius: 8px;
    height: 200px;
    object-fit: cover;
}

.class-card h3 {
    font-size: 1.8rem;
    margin: 20px 0;
    color: #333;
}

.class-card p {
    color: #777;
    margin-bottom: 20px;
}

.class-card .btn {
    background-color: #ff6b6b;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: 600;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.class-card .btn:hover {
    background-color: #ff5252;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
}

@media (max-width: 768px) {
    .classes-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .classes-grid {
        grid-template-columns: 1fr;
    }
}
</style>
<body>

<!-- Main Content Section -->
<div class="classes-container">
    <h2>Join Our Group Classes</h2>
    <div class="classes-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="class-card">
                    <img src="images/' . $row['class_image'] . '" alt="' . $row['class_name'] . ' Image">
                    <h3>' . $row['class_name'] . '</h3>
                    <p>Instructor: ' . $row['trainer_name'] . '</p>
                    <p>' . $row['class_description'] . '</p>
                    <a href="book_class.php?class_id=' . $row['id'] . '" class="btn">Join Now</a>
                </div>';
            }
        } else {
            echo '<p>No classes available at the moment.</p>';
        }
        ?>
    </div>
</div>

<?php
include('footer.php'); // Include footer at the bottom of the page
?>

</body>
</html>
