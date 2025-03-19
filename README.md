# E-commerce-personal-project
Artilyforever is my small business, and is a full-stack e-commerce platform built using PHP, MySQL, HTML, CSS, and JavaScript. It allows users to browse, purchase, and manage art-related products efficiently. It is a responsive website, both customers and admin have separate UI.

Artilyforever - E-commerce Website 
It is full-stack e-commerce platform for selling art-related products, built with PHP, MySQL, HTML, CSS, and JavaScript.

Features
- User Authentication – Secure login & registration system
- Product Management – Add, update, and delete products
- Shopping Cart – Add items to cart & checkout
- Payment Integration – Secure payment gateway (Future update)
- Order Management – Track orders & manage inventory
- Admin Dashboard – Manage products, users, and orders
- Responsive Design 

Tech Stack:
Frontend: HTML, CSS, JavaScript, Bootstrap
Backend: PHP (MySQLi)
Database: MySQL
Styling: Bootstrap for UI

 Installation Guide
1. Clone the Repository
bash
Copy
Edit
git clone https://github.com/your-username/artily.git
cd artily
2. Setup Database
Open MySQL Workbench or phpMyAdmin
Create a new database: ecommerce_db
Import the database.sql file from the database folder
3. Configure Database Connection
Edit includes/connect.php and update your MySQL credentials:
php
Copy
Edit
$conn = new mysqli("127.0.0.1", "root", "", "ecommerce_db", 3307);
5. Start XAMPP & Run the Project
Open XAMPP Control Panel, start Apache & MySQL
Open the browser and go to:
bash
Copy
Edit
http://localhost/Artily/public/
📂 Folder Structure
csharp
Copy
Edit
Artily/
│── database/          # SQL files
│── includes/          # DB connection, helpers
│── public/            # Main frontend (index.php, cart.php, product.php)
│── admin/             # Admin panel
│── assets/            # CSS, JS, Images
│── README.md          # Project documentation

Future Enhancements:
- Add payment gateway integration
- Improve UI
- Debug and improve the backend
- Implement AJAX-based cart updates
- Enhance UI with modern frameworks like Vue.js

Contributing
Feel free to fork this repository, create a new branch, and submit a pull request with your enhancements.

License:
This project is open-source under the MIT License.
