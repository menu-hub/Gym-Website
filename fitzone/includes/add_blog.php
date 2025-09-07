<?php
session_start();
require_once "db_connect.php"; // Your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author_role = $_SESSION["staff_username"] ?? "staff"; // Default to 'staff'

    // Image upload
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . time() . "_" . $image_name;

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO blog_posts (title, content, image_path, author_role, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $title, $content, $target_file, $author_role);

        if ($stmt->execute()) {
            echo "Blog post added successfully!";
        } else {
            echo "Database error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blog Post</title>
    <style>
        body {
    background: url('images/gym.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
}
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Add Blog Post</h2>
    <form action="add_blog.php" method="POST" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Content:</label>
        <textarea name="content" rows="6" required></textarea>

        <label>Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Add Blog</button>
    </form>
</body>
</html>
