<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Artilyforever</title>
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #e47fb8;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
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
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        .navbar .nav-links a:hover {
            color: #f8c8d2;
        }

        footer {
            background-color: #e47fb8;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }

        footer a {
            color: #f8c8d2;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffb3cc;
        }

        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
            padding: 20px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 36px;
            color: #5d3f57;
            margin-bottom: 10px;
        }

        .dashboard-header p {
            font-size: 18px;
            color: #777;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            width: 250px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 22px;
            color: #5d3f57;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #f8c8d2;
            color: #5d3f57;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ffb3cc;
        }

        .logout-btn {
            margin-top: 30px;
            padding: 12px 25px;
            background-color: #e47fb8;
            border-radius: 25px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            display: block;
            text-align: center;
            width: 200px;
            margin-bottom: 50px;
        }

        .logout-btn:hover {
            background-color: #f8c8d2;
        }

        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                gap: 20px;
                align-items: center;
            }

            .card {
                width: 80%;
                max-width: 400px;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">Artilyforever</div>
        <ul class="nav-links">
             <li><a href="logout.php">Logout</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
        </ul>
    </div>

    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1>Artilyforever - ADMIN DASHBOARD</h1>
            <p>Manage your store and track products, orders, and more</p>
        </div>

        <div class="card-container">
            <div class="card">
                <h3>Manage Products</h3>
                <p>View, edit, and delete products</p>
                <a href="manage_products.php" class="btn">Manage Products</a>
            </div>

            <div class="card">
                <h3>Manage Orders</h3>
                <p>View and process customer orders</p>
                <a href="manage_orders.php" class="btn">Manage Orders</a>
            </div>

            <div class="card">
                <h3>Add Product</h3>
                <p>Add new products to your store</p>
                <a href="add-product.php" class="btn">Add Product</a>
            </div>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <footer>
        <p>&copy; 2024 Artilyforever</p>
    </footer>

</body>
</html>

