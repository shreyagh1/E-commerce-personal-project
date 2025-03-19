<?php
session_start();
include '../includes/connect.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;

// Remove item from the cart
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($cart[$id])) {
        unset($cart[$id]);
        $_SESSION['cart'] = $cart; 
    }
    header("Location: cart.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artily - Cart</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fffaf3;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #ffcde9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 22px;
            font-weight: bold;
            color: #5d3f57;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .navbar .nav-links li {
            margin: 0 10px;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #5d3f57;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .navbar .nav-links a:hover {
            color: #ff69b4;
        }

        /* Cart Section */
        .cart-container {
            flex: 1;
            max-width: 98%; /* Wider container (almost full width) */
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .cart-container h2 {
            text-align: center;
            color: #ff69b4;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .cart-header, .cart-item {
            display: grid;
            grid-template-columns: 5fr 2fr 1fr 2fr 2fr; /* Expanded product column */
            justify-items: center;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .cart-header {
            font-weight: bold;
            background-color: #f8f1f1;
        }

        .cart-item {
            background-color: #fef5f5;
        }

        .cart-item button {
            background-color: #ff69b4;
            color: white;
            padding: 5px 15px;
            border: none;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s;
        }

        .cart-item button:hover {
            background-color: #ff3b8f;
            transform: scale(1.05);
        }

        .cart-total {
            text-align: right;
            font-size: 20px;
            color: #333;
            margin: 20px 0;
        }

        .checkout-button {
            display: block;
            background-color: #ff69b4;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 25px;
            text-decoration: none;
            margin: 20px auto;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s;
        }

        .checkout-button:hover {
            background-color: #ff3b8f;
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background-color: #ffcde9;
            padding: 15px;
            text-align: center;
            margin-top: auto;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        footer .footer-content p {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        footer .footer-links {
            list-style: none;
            padding: 0;
            margin: 10px 0;
            display: flex;
            justify-content: center;
        }

        footer .footer-links li {
            margin: 0 15px;
        }

        footer .footer-links li a {
            text-decoration: none;
            color: #5d3f57;
            font-weight: bold;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        footer .footer-links li a:hover {
            color: #ff69b4;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">Artilyforever</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Keep shopping</a></li>
            </ul>
        </nav>
    </header>

    <div class="cart-container">
        <h2>Your Cart</h2>
        <?php if (empty($cart)) : ?>
            <p style="text-align: center; color: #666;">Your cart is empty. Shop now to add items to your cart.</p>
        <?php else : ?>
            <div class="cart-header">
                <div>Product</div>
                <div>Price</div>
                <div>Quantity</div>
                <div>Subtotal</div>
                <div>Action</div>
            </div>
            <?php foreach ($cart as $id => $item) : 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <div class="cart-item">
                    <div><?php echo htmlspecialchars($item['name']); ?></div>
                    <div>Rs. <?php echo number_format($item['price'], 2); ?></div>
                    <div><?php echo htmlspecialchars($item['quantity']); ?></div>
                    <div>Rs. <?php echo number_format($subtotal, 2); ?></div>
                    <div>
                        <a href="cart.php?action=remove&id=<?php echo $id; ?>">
                            <button>Remove</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="cart-total">Total: Rs. <?php echo number_format($total, 2); ?></div>
            <a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
        <?php endif; ?>
    </div>

    <!-- Footer -->
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
</body>
</html>

