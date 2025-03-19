<?php
session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <style>

        .product-details {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 15px; 
            padding: 20px;
        }

        
        .product-container {
            display: flex;
            align-items: flex-start;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1000px; 
            text-align: left;
            gap: 30px;
        }

        .product-container img {
            max-width: 400px; 
            height: auto; 
            border-radius: 10px;
            margin-right: 20px; 
        }

        .product-details-section {
            max-width: 600px; 
            text-align: left;
        }

        .product-container h3 {
            font-size: 28px;
            font-weight: bold;
            margin: 10px 0;
        }

        .product-container p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        .product-description {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .add-to-cart-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #ff99cc; 
            color: white;
            padding: 12px 20px;
            border-radius: 50px; 
            border: none;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .add-to-cart-btn i {
            margin-right: 8px; 
        }

        .add-to-cart-btn:hover {
            background-color: #ff66b2; 
            transform: scale(1.05); 
        }

        .add-to-cart-btn:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.8);
        }


        footer {
            background-color:  #fce8f3;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }

        footer .footer-content p {
            color: #333;
            font-size: 14px;
        }

        footer .footer-links {
            list-style: none;
            padding: 0;
        }

        footer .footer-links li {
            display: inline;
            margin-right: 15px;
        }

        footer .footer-links a {
            color: #ff66b2;
            text-decoration: none;
            font-size: 14px;
        }
        .floating-cart {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: white; 
    padding: 10px;
    border-radius: 50%; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    transition: background-color 0.3s ease;
}

.floating-cart img {
    width: 40px;  
    height: 40px;
}

.floating-cart:hover {
    background-color: hsl(309, 61%, 39%); 
}

    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">Artilyforever</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Shop</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Search products..." />
                <button type="submit">Search</button>
            </form>
        </nav>
    </header>

    <!-- Product Details Section -->
    <section class="product-details">
        <div class="product-container">
            <?php
            include '../includes/connect.php';
            if (isset($_GET['id'])) {
                $product_id = $_GET['id'];
                $query = "SELECT * FROM products WHERE product_id = '$product_id'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $product = mysqli_fetch_assoc($result);
            ?>
            <img src="../assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <div class="product-details-section">
                <h3><?php echo $product['name']; ?></h3>
                <p>Rs. <?php echo $product['price']; ?></p>
                <div class="product-description">
                    <p><?php echo $product['description']; ?></p> <!-- Product description -->
                </div>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <button class="add-to-cart-btn" type="submit">
                        <i class="fas fa-cart-plus"></i> Add to Cart
                    </button>
                </form>
            </div>
            <?php
                } else {
                    echo "<p>Product not found!</p>";
                }
            }
            ?>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Artilyforever. All Rights Reserved.</p>
            <ul class="footer-links">
                <li><a href="terms.php">Terms of Service</a></li>
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </footer>
    <div class="floating-cart">
    <a href="cart.php">
        <img src="../assets/images/cart-icon.png" alt="Cart">
    </a>
</body>
</html>