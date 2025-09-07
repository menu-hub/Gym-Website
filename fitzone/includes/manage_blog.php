<?php
session_start();
require_once "db_connect.php";

$result = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Blogs</title>
    <style>
        body {
            background: url('images/gym.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            margin: 50px auto;
            width: 90%;
            max-width: 1000px;
            border-radius: 15px;
        }
        h2 {
            text-align: center;
        }
        a {
            color: #66ccff;
        }
        table {
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            color: #000;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        .add-btn {
            display: inline-block;
            background-color: #28a745;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Manage Blog Posts</h2>
    <a class="add-btn" href="add_blog.php">+ Add New Blog Post</a>
    <table>
        <tr>
            <th>Title</th>
            <th>Author Role</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= $row['author_role'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <a href="edit_blog.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete_blog.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this blog post?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
