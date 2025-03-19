<?php
session_start(); 

// If the cart is empty, redirect the user to the cart page
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user info from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $_SESSION['cart'] = [];

    // Redirect to an order confirmation page
    header('Location: order_confirmation.php');
    exit();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Artily</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff69b4;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        nav {
            background-color: #ff69b4;
            padding: 15px 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }

        nav ul li a:hover {
            color: #fff0f5;
        }

        .checkout-container {
            width: 80%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .checkout-container h2 {
            text-align: center;
            font-size: 32px;
            color: #ff69b4;
            margin-bottom: 20px;
        }

        .checkout-summary {
            margin-bottom: 40px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .checkout-summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .checkout-summary th, .checkout-summary td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .checkout-summary th {
            background-color: #ffe4e1;
            color: #ff69b4;
            font-weight: bold;
        }

        .checkout-summary td {
            background-color: #f9f9f9;
        }

        .total-price {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
            padding-top: 10px;
        }

        .form-container {
            margin-top: 40px;
        }

        .form-container h3 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-container input:focus, .form-container textarea:focus {
            border-color: #ff69b4;
        }

        .form-container button {
            padding: 15px 20px;
            background-color: #ff69b4;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #ff3b8f;
        }

        footer {
            background-color: #ff69b4;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 16px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .back-to-cart {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #ff69b4;
            text-decoration: none;
        }

        .back-to-cart:hover {
            color: #ff3b8f;
        }
    </style>
</head>
<body>


<header>
    <div>Artily</div>
</header>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Shop</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>

<div class="checkout-container">

    <h2>Checkout</h2>

    <div class="checkout-summary">
        <h3>Your Order Summary</h3>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php
            $cart_total = 0;
            foreach ($_SESSION['cart'] as $product_id => $product) {
                $total_price = $product['price'] * $product['quantity'];
                $cart_total += $total_price;
                echo "<tr>
                        <td>{$product['name']}</td>
                        <td>Rs. {$product['price']}</td>
                        <td>{$product['quantity']}</td>
                        <td>Rs. {$total_price}</td>
                      </tr>";
            }
            ?>
        </table>
        <div class="total-price">
            <strong>Total: Rs. <?php echo $cart_total; ?></strong>
        </div>
    </div>


    <div class="form-container">
        <h3>Enter Shipping Information</h3>
        <form action="checkout.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="phone" placeholder="Your Phone Number" required>
            <textarea name="address" placeholder="Your Shipping Address" required></textarea>
            <button type="submit">Place Order</button>
        </form>
    </div>

    
    <a href="cart.php" class="back-to-cart">Back to Cart</a>

</div>

<footer>
    &copy; 2024 Artily. All Rights Reserved.
</footer>

</body>
</html>

