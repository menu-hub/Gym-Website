<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}

require_once "db_connect.php";

// Fetch all trainers
$query_trainers = "SELECT * FROM trainers";
$result_trainers = $conn->query($query_trainers);

// Fetch all staff
$query_staff = "SELECT * FROM staff";
$result_staff = $conn->query($query_staff);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-image: url('images/jim1.jpg'); /* Your background image */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .dashboard-container {
            background: rgba(0, 0, 0, 0.75);
            padding: 40px;
            margin: 60px auto;
            width: 90%;
            max-width: 1200px;
            border-radius: 16px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.6);
        }

        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #f0db4f;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0db4f;
            padding-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            color: #000;
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        a {
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

        .add-btn {
            display: inline-block;
            margin-top: 15px;
            background: #f0db4f;
            color: #000;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #fff700;
        }

        .logout-btn {
            float: right;
            margin-top: -60px;
            background: #dc3545;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #b52a37;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <form method="post" action="logout.php">
            <button type="submit" class="logout-btn">Logout</button>
        </form>

        <h2>Welcome, Admin</h2>

        <div class="section">
            <h3>Manage Trainers</h3>
            <table>
                <tr>
                    <th>Trainer Name</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result_trainers->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>
                        <a href="edit_trainer.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete_trainer.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <a href="add_trainer.php" class="add-btn">Add New Trainer</a>
        </div>

        <div class="section">
            <h3>Manage Staff</h3>
            <table>
                <tr>
                    <th>Staff Name</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result_staff->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>
                        <a href="edit_staff.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete_staff.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <a href="add_staff.php" class="add-btn">Add New Staff</a>
        </div>
    </div>
</body>
</html>
s