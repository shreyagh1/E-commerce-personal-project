<?php
include '../includes/connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $checkEmailQuery = "SELECT * FROM customers WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        $insertQuery = "INSERT INTO customers (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>
                    alert('Registration successful! Please log in.');
                    window.location.href = 'login.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Artilyforever</title>
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #fef6f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background: #f8c8d2;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #5d3f57;
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
            font-weight: bold;
        }

        .navbar .nav-links a:hover {
            color: #fff;
        }

        
        .form-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            margin: 60px auto 20px;
        }

        .form-container h2 {
            color: #5d3f57;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            font-weight: bold;
            color: #5d3f57;
            margin-bottom: 5px;
            text-align: left;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            background: #f8c8d2;
            color: #5d3f57;
            border: none;
            padding: 12px 20px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background: #ffb3cc;
        }

        .form-container p {
            margin-top: 10px;
            font-size: 14px;
        }

        .form-container a {
            color: #5d3f57;
            text-decoration: none;
            font-weight: bold;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        
        footer {
            background: #f8c8d2;
            text-align: center;
            padding: 20px;
            margin-top: auto;
            color: #5d3f57;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 10px 0;
        }

        footer .footer-links a {
            text-decoration: none;
            color: #5d3f57;
            font-weight: bold;
        }

        footer .footer-links a:hover {
            color: #fff;
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
            </ul>
        </nav>
    </header>


    <div class="form-container">
        <h2>Create Your Account</h2>
        <form method="POST" action="">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter a strong password" required>
            
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <footer>
        <div>&copy; 2024 Artilyforever. All Rights Reserved.</div>
        <ul class="footer-links">
            <li><a href="terms.php">Terms of Service</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </footer>
</body>
</html>
