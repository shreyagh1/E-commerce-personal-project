<?php
include '../includes/connect.php';

$order_id = $_GET['id'];

$sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if (isset($_POST['update_status'])) {
    $status = $_POST['order_status'];
    $sql = "UPDATE orders SET status = '$status' WHERE order_id = '$order_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Order status updated!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Update Order Status</title>
</head>
<body>
    <h1>Update Order Status</h1>
    
    <form action="update_order.php?id=<?php echo $order_id; ?>" method="POST">
        <label for="order_status">Order Status:</label><br>
        <select name="order_status" required>
            <option value="Pending" <?php echo ($order['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="Shipped" <?php echo ($order['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
            <option value="Delivered" <?php echo ($order['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
        </select><br><br>

        <button type="submit" name="update_status">Update Status</button>
    </form>
</body>
</html>
