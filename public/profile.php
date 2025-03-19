<?php
session_start();
include '../includes/connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include('header.php'); ?>

    <section class="profile">
        <h2>Your Profile</h2>
        <form action="update_profile.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" required><?php echo $user['address']; ?></textarea>

            <input type="submit" value="Update Profile" class="btn">
        </form>
</section>
    <?php include('footer.php'); ?>
</body>
</html>
