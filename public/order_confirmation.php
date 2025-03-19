<?php
session_start();

if (isset($_SESSION['order_success']) && $_SESSION['order_success'] === true) {
    $order_id = $_SESSION['order_id']; 
    $total_amount = $_SESSION['total_amount']; // Total amount of the order
    // Clear the cart after order is confirmed
    unset($_SESSION['cart']);
    unset($_SESSION['order_success']);
    unset($_SESSION['order_id']);
    unset($_SESSION['total_amount']);
} else {
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include('header.php'); ?>

    <section class="order-confirmation">
        <h2>Thank You for Your Order!</h2>
        <p>Your order has been successfully placed. Below are your order details:</p>
        <table>
            <tr>
                <th>Order ID</th>
                <td><?php echo $order_id; ?></td>
            </tr>
            <tr>
                <th>Total Amount</th>
                <td>Rs. <?php echo $total_amount; ?></td>
            </tr>
        </table>
        <p>We will send you a confirmation email with the details shortly.</p>
        <a href="index.php" class="btn">Continue Shopping</a>
    </section>

    <?php include('footer.php'); ?>
</body>
</html>
