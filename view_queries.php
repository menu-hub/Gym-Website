<?php
require_once "db_connect.php"; // DB connection
session_start();

// Handle response submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['response'], $_POST['id'])) {
    $id = intval($_POST['id']);
    $response = trim($_POST['response']);

    $stmt = $conn->prepare("UPDATE queries SET response = ? WHERE id = ?");
    $stmt->bind_param("si", $response, $id);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Queries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/gym.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: rgba(255,255,255,0.95);
            padding: 30px;
            max-width: 900px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .query {
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
        }

        .query:last-child {
            border-bottom: none;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            resize: vertical;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .submitted {
            color: gray;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Customer Queries</h2>
        <?php
        $result = $conn->query("SELECT * FROM queries ORDER BY submitted_at DESC");
        while ($row = $result->fetch_assoc()) {
        ?>
        <div class="query">
            <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
            <p><strong>Message:</strong> <?= nl2br(htmlspecialchars($row['message'])) ?></p>
            <p class="submitted"><strong>Submitted At:</strong> <?= $row['submitted_at'] ?></p>

            <form method="POST">
                <label for="response">Response:</label>
                <textarea name="response" rows="4"><?= htmlspecialchars($row['response']) ?></textarea>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit">Send Response</button>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
