<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $stmt = $conn->prepare("INSERT INTO queries (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  if ($stmt->execute()) {
    header("Location: contact_us.php?success=1");
    exit();
  } else {
    echo "Error: " . $conn->error;
  }

  $stmt->close();
  $conn->close();
}
?>
