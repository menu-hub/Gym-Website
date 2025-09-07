<?php
require_once "db_connect.php";
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];

    // Handle new image upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "uploads/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

        $stmt = $conn->prepare("UPDATE trainers SET name=?, description=?, image=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $description, $imagePath, $id);
    } else {
        $stmt = $conn->prepare("UPDATE trainers SET name=?, description=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $description, $id);
    }

    $stmt->execute();
    header("Location: admin_dashboard.php");
    exit;
}

$result = $conn->query("SELECT * FROM trainers WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Trainer</title>
</head>
<body>
    <h2>Edit Trainer</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="4" cols="50"><?= $row['description'] ?></textarea><br><br>

        <label>Change Image:</label><br>
        <input type="file" name="image"><br><br>
        <?php if ($row['image']): ?>
            <img src="<?= $row['image'] ?>" width="150"><br><br>
        <?php endif; ?>

        <input type="submit" value="Update Trainer">
    </form>
</body>
</html>
