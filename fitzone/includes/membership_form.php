<?php
// Connect to DB
include 'db_connect.php'; // Make sure this connects to your database

// Fetch membership plans
$plans = [];
$sql = "SELECT * FROM memberships";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $plans[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/jim1.jpg') no-repeat center center fixed;
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
    <h2>Join FitZone Membership</h2>
    <form action="process_membership.php" method="POST">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone">

        <label for="plan_id">Select Plan:</label>
        <select name="plan_id" required>
            <option value="">-- Choose a Membership Plan --</option>
            <?php foreach ($plans as $plan): ?>
                <option value="<?= $plan['plan_id'] ?>">
                    <?= $plan['plan_name'] ?> - <?= $plan['duration'] ?> - Rs.<?= number_format($plan['price'], 2) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
