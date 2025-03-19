<?php
session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artilyforever - Shop</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
   
     <style>
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
            
            <form action="search.php" method="get" class="search-form">
                <input type="text" name="search" placeholder="Search products..." />
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </nav>
    </header>
    

    <section class="products">
        <h2>Shop Our Products</h2>
        <div class="product-grid">
            <?php
            include '../includes/connect.php';

            if (isset($_GET['search'])) {
                $search_query = $_GET['search'];
                $query = "SELECT * FROM products WHERE name LIKE '%$search_query%'";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);
            }

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <div class='product-card'>
                            <img src='../assets/images/{$row['image']}' alt='{$row['name']}'>
                            <h3>{$row['name']}</h3>
                            <p>Rs.{$row['price']}</p>
                            <a href='product.php?id={$row['product_id']}' class='btn'>View Details</a>
                        </div>
                    ";
                }
            } else {
                echo "<p>No products available at the moment.</p>";
            }
            ?>
        </div>
    </section>


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

