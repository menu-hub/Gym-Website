<?php
require_once "db_connect.php";
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $sql = "UPDATE blog_posts SET title=?, content=?, image_path=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $content, $target, $id);
    } else {
        $sql = "UPDATE blog_posts SET title=?, content=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $content, $id);
    }

    $stmt->execute();
    header("Location: manage_blogs.php");
    exit;
}

$result = $conn->query("SELECT * FROM blog_posts WHERE id=$id");
$blog = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Edit Blog</title></head>
<body>
<h2>Edit Blog Post</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= $blog['title'] ?>" required><br><br>

    <label>Content:</label><br>
    <textarea name="content" rows="6" cols="60"><?= $blog['content'] ?></textarea><br><br>

    <label>Change Image (optional):</label><br>
    <input type="file" name="image"><br><br>

    <input type="submit" value="Update Blog">
</form>
</body>
</html>
