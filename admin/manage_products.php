<?php
session_start();
include('../includes/connect.php'); 

$query = "SELECT product_id, name, description, price, image FROM products";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching products: " . mysqli_error($conn));
}

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM products WHERE product_id = $delete_id";
    if (mysqli_query($conn, $delete_query)) {
        header('Location: manage_products.php');
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding-bottom: 60px; 
        }

        .navbar {
    width: 100%;
    background-color: #f8c8d2;
    padding: 15px 20px; 
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
}

.navbar .logo {
    font-size: 24px;
    font-weight: bold;
    color: #5d3f57;
    text-align: center;
    flex: 1; 
}

.navbar .nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    flex: 2;
    justify-content: flex-end; 
}

.navbar .nav-links li {
    display: inline-block;
}

.navbar .nav-links a {
    text-decoration: none;
    color: #5d3f57;
    font-size: 16px;
    padding: 10px;
    transition: color 0.3s ease;
}

.navbar .nav-links a:hover {
    color: #ffb3cc;
}


        footer {
            background-color: #f8c8d2;
            color: #5d3f57;
            text-align: center;
            padding: 15px 0;
            width: 100%;
        }

        .manage-products {
            padding: 80px 20px;
            width: 100%;
            max-width: 1200px;
        }

        .manage-products h2 {
            color: #5d3f57;
            text-align: center;
            margin-bottom: 20px;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .product-table th,
        .product-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .product-table th {
            background-color: #f8c8d2;
            color: #5d3f57;
        }

        .product-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            margin: 0 5px;
        }

        .action-buttons .btn {
            background-color: #f8c8d2;
            color: #5d3f57;
            transition: background-color 0.3s ease;
        }

        .action-buttons .btn:hover {
            background-color: #ffb3cc;
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="logo">Artilyforever.in - Admin</div>
        <ul class="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add-product.php">Add Product</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </header>

    <section class="manage-products">
        <h2>Manage Products</h2>

        <table class="product-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td>
                            <img src="../assets/images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" width="50" height="50">
                        </td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars(substr($row['description'], 0, 50)); ?>...</td>
                        <td>Rs. <?php echo htmlspecialchars($row['price']); ?></td>
                        <td class="action-buttons">
                            <!-- Edit Button -->
                            <a href="edit_product.php?product_id=<?php echo urlencode($row['product_id']); ?>" class="btn">Edit</a>
                            <!-- Delete Button -->
                            <a href="?delete_id=<?php echo urlencode($row['product_id']); ?>" class="btn" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Artily. All rights reserved.</p>
    </footer>

</body>
</html>

