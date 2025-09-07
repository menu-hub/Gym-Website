<?php
session_start();
if (!isset($_SESSION['staff_username'])) {
    header("Location: staff_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    <style>
        /* Background and general style */
        body {
    background: url('images/staff.jpg') no-repeat center center fixed;
    background-size: cover;
    color: black;
    font-family: Arial, sans-serif;
    margin: 0;
}

        .overlay {
            background: rgba(0, 0, 0, 0.7);
            height: 100vh;
            padding: 40px;
        }

        .dashboard {
            max-width: 800px;
            margin: auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 36px;
            color: #00ffcc;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 30px;
            width: 250px;
            transition: 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .card:hover {
            background-color: rgba(0, 255, 204, 0.2);
            transform: scale(1.05);
        }

        .card img {
            width: 60px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .logout-btn {
            margin-top: 40px;
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="dashboard">
            <h1>Welcome, <?php echo $_SESSION['staff_username']; ?></h1>
            <div class="card-container">
                <a href="view_queries.php" class="card">
                    <img src="/images/queries.jpg" alt="Queries">
                    <div class="card-title">Manage Queries</div>
                </a>
                <a href="manage_blog.php" class="card">
                    <img src="../images/blog-icon.png" alt="Blogs">
                    <div class="card-title">Manage Blogs</div>
                </a>
            </div>
            <a class="logout-btn" href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
