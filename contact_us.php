<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/jym.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(0,0,0,0.7);
            padding: 30px;
            border-radius: 15px;
        }
        h2 {
            text-align: center;
            color: #ffcc00;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: none;
            margin-top: 5px;
            border-radius: 5px;
        }
        button {
            margin-top: 20px;
            background: #ffcc00;
            color: #000;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #e6b800;
        }
    </style>
</head>
<body>
<div class="container">
<div style="background: url('images/jim1.jpg') no-repeat center center/cover; min-height: 100vh; padding: 50px;">
  <div style="max-width: 600px; margin: auto; background-color: rgba(11, 9, 9, 0.9); padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">
    <h2 style="text-align:center; margin-bottom: 20px;">Contact Us</h2>

    <form action="process_query.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required style="padding: 10px; margin-bottom: 15px;">

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required style="padding: 10px; margin-bottom: 15px;">

      <label for="message">Message:</label>
      <textarea name="message" id="message" rows="5" required style="padding: 10px; margin-bottom: 20px;"></textarea>

      <button type="submit" style="background-color: #28a745; color: white; padding: 12px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
        Send Message
      </button>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>
