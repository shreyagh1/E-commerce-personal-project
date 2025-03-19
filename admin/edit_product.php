<?php
session_start();
include('../includes/connect.php'); 

if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching product data: " . mysqli_error($conn));
    }

    $product = mysqli_fetch_assoc($result);
    if (!$product) {
        die("Product not found!");
    }
} else {
    die("Invalid product ID.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $image = $product['image']; 
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_path = "../assets/images/" . $image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {
            $image = $image_name; 
        } else {
            echo "Error uploading image.";
        }
    }

    $update_query = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, image = ? WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, 'ssdisi', $name, $description, $price, $stock, $image, $product_id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: manage_products.php');
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
        }

        h1 {
            color: #5d3f57;
            margin: 20px 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
        }

        .form-container input,
        .form-container textarea,
        .form-container button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .form-container input[type="file"] {
            border: none;
            background-color: transparent;
            padding: 10px;
        }

        .form-container button {
            background-color: #f8c8d2;
            color: #5d3f57;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #ffb3cc;
        }

        .form-container input:focus,
        .form-container textarea:focus {
            border-color: #f8c8d2;
            outline: none;
        }

        .navbar {
            width: 100%;
            background-color: #f8c8d2;
            padding: 10px 0;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            z-index: 1000;
        }

        .navbar .logo {
            color: #5d3f57;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar .nav-links li {
            display: inline-block;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #5d3f57;
            font-size: 16px;
        }

        .navbar .nav-links a:hover {
            color: #ffb3cc;
        }

        footer {
            background-color: #f8c8d2;
            color: #5d3f57;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

    </style>
</head>
<body>

    <header class="navbar">
        <div class="logo">Artilyforever.in - Admin</div>
        <ul class="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </header>

    <h1>Edit Product</h1>

    <div class="form-container">
        <form action="edit_product.php?product_id=<?php echo $product['product_id']; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required placeholder="Product Name">
            <textarea name="description" required placeholder="Product Description"><?php echo htmlspecialchars($product['description']); ?></textarea>
            <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" step="0.01" required placeholder="Price (e.g., 999.99)">
            <input type="number" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required placeholder="Stock Quantity">
            <input type="file" name="image" accept="image/*">
            <button type="submit">Update Product</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Artily. All rights reserved.</p>
    </footer>

</body>
</html>




