<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Artilyforever</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #fef6f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .about-section {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        .about-section h1 {
            font-size: 2.8em;
            color: #f8a3b7;
            margin-bottom: 20px;
            font-weight: bold;
            animation: slideIn 1s ease-in-out;
        }

        .about-section p {
            font-size: 1.3em;
            color: #555;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .about-image img {
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            display: block;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #f8a3b7;
            color: white;
            text-decoration: none;
            font-size: 1.1em;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #ff6d8d;
            transform: translateY(-2px);
        }

        footer {
            background: #fce8f3;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="about-section">
        <h1>About Artilyforever</h1>
        <p>
            Welcome to Artilyforever! Our mission is to bring charm and joy into your everyday life 
            with curated, high-quality products that inspire and delight. We believe in adding a little touch of happiness to 
            the ordinary, making every moment a bit more special.
            
        </p>
        <div class="about-image">
            <img src="../assets/images/logo.jpg" alt="Artilyforever Team">
        </div>
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
