<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            height: 100vh;
            display: grid;
            grid-template-rows: auto 1fr auto; 
            padding-top: 80px; 
        }
        
        h1 {
            font-size: 2.5rem;
            text-align: center;
            color: #5d3f57;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 800px; 
            width: 100%;
            margin: 0 auto;
            padding: 40px; 
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px; 
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, textarea, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        input[type="file"] {
            border: none;
            padding: 0;
        }

        input:focus, textarea:focus, button:focus {
            outline: none;
            border-color: #f8c8d2;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            background-color: #f8c8d2;
            color: #5d3f57;
            cursor: pointer;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ffb3cc;
        }

        .form-container input[type="file"] {
            background-color: #f8c8d2;
            color: #5d3f57;
        }

        .form-container label {
            font-size: 16px;
            color: #5d3f57;
        }

        .form-container input, .form-container textarea, .form-container button {
            margin-bottom: 10px;
        }

        nav {
            background-color: #e47fb8;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        nav .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #5d3f57;
        }

        nav .menu {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav .menu li {
            display: inline-block;
        }

        nav .menu a {
            color: #5d3f57;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
        }

        nav .menu a:hover {
            color: #ffb3cc;
        }

        footer {
            background-color: #e47fb8;
            color: #5d3f57;
            text-align: center;
            padding: 15px 0;
            width: 100%;
        }

    </style>
</head>
<body>

    <nav>
        <div class="logo">Artilyforever</div>
        <ul class="menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="manage_orders.php">Manage Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="form-container">
        <h1>Add New Product</h1>
        <form action="../includes/add-product-handler.php" method="POST" enctype="multipart/form-data">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" placeholder="Product Name" required>

            <label for="description">Product Description</label>
            <textarea name="description" id="description" placeholder="Product Description" required></textarea>

            <label for="price">Price (e.g., 999.99)</label>
            <input type="number" name="price" id="price" placeholder="Price" step="0.01" required>

            <label for="stock">Stock Quantity</label>
            <input type="number" name="stock" id="stock" placeholder="Stock Quantity" required>

            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <button type="submit">Add Product</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Artilyforever. All rights reserved.</p>
    </footer>

</body>
</html>




