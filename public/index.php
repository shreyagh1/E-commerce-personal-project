<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artilyforever - Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .hero {
    background: url('../assets/images/banner.jpg') no-repeat center center/cover;
    height: 28vh;
    text-align: center;
    color: white;
    padding: 0 20px;
    background-position: center;
    background-attachment: fixed;
}

    

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-top: 0;
        }

        .hero p {
            font-size: 20px;
            margin-top: 10px;
        }

        .hero .btn {
            background-color: #f8c8d2;
            color: #5d3f57;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .hero .btn:hover {
            background-color: #ffb3cc;
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
            <div class="logo">Artilyforever.in</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Shop</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>ARTILYFOREVER</h1>
            <p>Your one-stop shop for cute pastel-themed products.</p>
            <a href="products.php" class="btn">Shop Now</a>
        </div>
    </section>

    <section class="featured-products">
        <h2>Our Featured Products</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="../assets/images/strawberrybunni.jpg" alt="Strawberry Bunni Lapel Pin">
                <h3>Strawberry Bunni Lapel Pin</h3>
                <p>Rs.250</p>
                <a href="product.php?id=4" class="btn">View Details</a>
            </div>
            <div class="product-card">
                <img src="../assets/images/tulipmagic.jpg" alt="Pastel Bunny Plush">
                <h3>Tulip Magic Acrylic Charm</h3>
                <p>Rs.150</p>
                <a href="product.php?id=3" class="btn">View Details</a>
            </div>
            <div class="product-card">
                <img src="../assets/images/Bigtotoroheart.jpg" alt="Pink Heart Mug">
                <h3>Big Totoro Acrylic Pin</h3>
                <p>Rs.150</p>
                <a href="product.php?id=5" class="btn">View Details</a>
            </div>
            <div class="product-card">
                <img src="../assets/images/miffybookmark.jpg" alt="Pink Heart Mug">
                <h3>Miffy Hologoraphic Magnetic Bookmark</h3>
                <p>Rs.170</p>
                <a href="product.php?id=4" class="btn">View Details</a>
            </div>
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
</div>

</body>
</html>
