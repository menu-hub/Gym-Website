<?php
$mysqli = new mysqli("localhost", "root", "", "fitzone");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'header.php'; ?>

    <title>FitZone Blog</title>
    <style>
        body {
    background: url('images/jim1.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
}
        .blog-container { max-width: 800px; margin: auto; }
        .post { background: white; padding: 20px; margin-bottom: 20px; border-radius: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        .post img { max-width: 100%; height: auto; border-radius: 5px; }
        .title { font-size: 24px; margin-bottom: 10px; color: #222; }
        .content { font-size: 16px; color: #444; }
        .meta { font-size: 12px; color: #999; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="blog-container">
        <h2>FitZone Blog Updates</h2>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="post">
                <div class="title"><?= htmlspecialchars($row['title']) ?></div>
                <?php if (!empty($row['image_path'])): ?>
                    <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="Blog Image">
                <?php endif; ?>
                <div class="content"><?= nl2br(htmlspecialchars($row['content'])) ?></div>
                <div class="meta">Posted by <?= htmlspecialchars($row['author_role']) ?> on <?= $row['created_at'] ?></div>
            </div>
           

        <?php endwhile; ?>
    </div>
</body>
<?php include 'footer.php'; ?>

</html>
