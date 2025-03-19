<?php
session_start(); 

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}

include '../includes/connect.php';

// Fetch user details from session
$customer_id = $_SESSION['customer_id'];
$email = $_SESSION['email']; 
$name = $_SESSION['name']; 

// Fetch order history for the logged-in user
$query = "SELECT * FROM orders WHERE customer_id = $user_id ORDER BY order_date DESC";
$result = mysqli_query;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo htmlspecialchars($user_name); ?>!</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fdf2f8;
            color: #5d3f57;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #ff69b4;
        }
        .welcome-message {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #ff69b4;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #ff1493;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
        <p class="welcome-message">We're glad to have you back. Here's your personalized dashboard.</p>

        <h2>Account Details:</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p>

        <h2>Quick Actions:</h2>
        <a href="order_history.php" class="btn">View Order History</a>
        <a href="edit_profile.php" class="btn">Edit Profile</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>
