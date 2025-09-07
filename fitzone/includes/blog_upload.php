<?php
$mysqli = new mysqli("localhost", "root", "", "fitzone");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $mysqli->real_escape_string($_POST["title"]);
    $content = $mysqli->real_escape_string($_POST["content"]);
    $author_role = $mysqli->real_escape_string($_POST["author_role"]);

    // Upload image
    $image_path = "";
    if ($_FILES["image"]["name"]) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir);
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
    }

    $stmt = $mysqli->prepare("INSERT INTO blog_posts (title, content, image_path, author_role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $image_path, $author_role);
    $stmt->execute();
    header("Location: blog.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Blog Post</title>
    <style>
        body {
    background: url('images/gym.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
}
        form { background: white; padding: 20px; max-width: 600px; margin: auto; border-radius: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        input, textarea, select { width: 100%; margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Add New Blog Post</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Content:</label>
        <textarea name="content" rows="6" required></textarea>

        <label>Upload Image:</label>
        <input type="file" name="image">

        <label>Author Role:</label>
        <select name="author_role" required>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
        </select>

        <button type="submit">Post</button>
    </form>
</body>
</html>
