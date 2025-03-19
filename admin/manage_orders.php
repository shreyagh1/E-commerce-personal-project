<?php
session_start();
include('../includes/connect.php'); 

$query = "
    SELECT 
        o.order_id, 
        u.name AS customer_name, 
        o.total_amount, 
        o.order_status AS status, 
        o.order_date, 
        p.name AS product_name, 
        op.quantity
    FROM orders o
    JOIN users u ON o.user_id = u.user_id
    JOIN order_products op ON o.order_id = op.order_id
    JOIN products p ON op.product_id = p.product_id
";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching orders: " . mysqli_error($conn));
}

if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    $update_query = "UPDATE orders SET order_status = '$new_status' WHERE order_id = '$order_id'";
    if (mysqli_query($conn, $update_query)) {
        
        header('Location: manage_orders.php');
        exit;
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - Artilyforever</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color:  #e47fb8; 
            color: white;
            padding: 10px 0;
            position: sticky;
            top: 0;
            width: 100%;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            color: #e47fb8;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-links li a:hover {
            color: #5d3f57;
        }

        .manage-orders {
            padding: 30px;
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .manage-orders h2 {
            text-align: center;
            font-size: 28px;
            color: #5d3f57;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        table th {
            background-color: #5d3f57;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        table tr:hover {
            background-color: #ffebf0;
        }

        footer {
            background-color: #e47fb8;
            color: white;
            text-align: center;
            padding: 15px 0;
            width: 100%;
            margin-top: 150px;
        }

        .update-status-btn {
            background-color: #f8c8d2;
            color: #5d3f57;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .update-status-btn:hover {
            background-color: #ffb3cc;
        }

        select {
            padding: 6px;
            font-size: 14px;
            border-radius: 5px;
            margin-left: 10px;
        }

        .form-container {
            display: inline-block;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">Artilyforever.in - Admin</div>
        <ul class="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="add-product.php">Add Product</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<section class="manage-orders">
    <h2>Manage Orders</h2>

    <table class="orders-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td>Rs. <?php echo htmlspecialchars($row['total_amount']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                    <td>
                        <form action="manage_orders.php" method="POST" class="form-container">
                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                            <select name="status">
                                <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="Shipped" <?php echo ($row['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                                <option value="Delivered" <?php echo ($row['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                                <option value="Cancelled" <?php echo ($row['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                            <button type="submit" name="update_status" class="update-status-btn">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>

<footer>
    <p>&copy; 2024 Artilyforever - All Rights Reserved</p>
</footer>

</body>
</html>




