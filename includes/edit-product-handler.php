<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = $_POST['product_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $imageSql = '';
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = "../assets/images/" . basename($imageName);

        if (move_uploaded_file($imageTmp, $imagePath)) {
            $imageSql = ", image = '$imageName'";
        } else {
            echo "<script>
                    alert('Failed to upload image!');
                    window.history.back();
                  </script>";
            exit;
        }
    }

    $query = "UPDATE products 
              SET name = '$name', description = '$description', price = $price, stock = $stock $imageSql 
              WHERE product_id = $product_id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Product updated successfully!');
                window.location.href='../admin/dashboard.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
