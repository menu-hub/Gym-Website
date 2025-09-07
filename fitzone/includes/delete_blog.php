<?php
require_once "db_connect.php"; // Connect to database

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // First, fetch the image path to delete the file
    $stmt = $conn->prepare("SELECT image_path FROM blog_posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($image_path);
    $stmt->fetch();
    $stmt->close();

    // Delete blog post from database
    $stmt = $conn->prepare("DELETE FROM blog_posts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Remove image file if it exists
        if ($image_path && file_exists($image_path)) {
            unlink($image_path);
        }
        $stmt->close();
        header("Location: staff_dashboard.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting blog post: " . $stmt->error;
    }
} else {
    echo "No blog post ID provided.";
}
?>
