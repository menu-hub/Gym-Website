<?php
require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];

    // Image upload handling
    $imagePath = "";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "images/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $stmt = $conn->prepare("INSERT INTO trainers (name, description, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $imagePath);
    $stmt->execute();

    header("Location: admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Trainer</title>
</head>
<body>
    <h2>Add New Trainer</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="4" cols="50"></textarea><br><br>

        <label>Image:</label><br>
        <input type="file" name="image"><br><br>

        <input type="submit" value="Add Trainer">
    </form>
</body>
</html>
