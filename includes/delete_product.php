<?php
include '../includes/connect.php';  

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $imagePath = "../assets/images/" . $product['image'];
        
        if (file_exists($imagePath)) {
            unlink($imagePath); 
        }

        $query = "DELETE FROM products WHERE product_id = $product_id";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Product deleted successfully!');
                    window.location.href='../admin/dashboard.php';
                  </script>";
        } else {
            echo "Error deleting product: " . mysqli_error($conn);
        }
    } else {
        echo "Product not found!";
    }
} else {
    echo "No product ID specified!";
}

mysqli_close($conn);
?>
