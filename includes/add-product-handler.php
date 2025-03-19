<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imagePath = "../assets/images/" . basename($imageName);

    if (move_uploaded_file($imageTmp, $imagePath)) {

        $query = "INSERT INTO products (name, description, price, stock, image) 
                  VALUES ('$name', '$description', '$price', '$stock', '$imageName')";

        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Product added successfully!');
                    window.location.href='../admin/dashboard.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>
                alert('Failed to upload image!');
                window.history.back();
              </script>";
    }
}

mysqli_close($conn);
?>
