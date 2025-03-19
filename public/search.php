<?php
session_start();
include '../includes/connect.php';

$search_query = isset($_GET['query']) ? mysqli_real_escape_string($conn, trim($_GET['query'])) : '';

echo "Search Query: " . $search_query . "<br>";

if ($search_query !== '') {
    
    $query = "SELECT * FROM products WHERE LOWER(name) LIKE LOWER('%$search_query%')";
    echo "SQL Query: " . $query . "<br>";  
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error in query: " . mysqli_error($conn));
    }
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    
</head>
<body>
    
    <?php include('../includes/header.php'); ?>

    <section class="search-results">
        <h2>Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h2>
        <div class="product-grid">
            <?php if ($search_query === ''): ?>
                <p>Please enter a search query.</p>
            <?php elseif ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($product = mysqli_fetch_assoc($result)): ?>
                    <div class="product-card">
                        <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p>Rs. <?php echo htmlspecialchars($product['price']); ?></p>
                        <a href="product.php?id=<?php echo $product['product_id']; ?>" class="btn">View Details</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No products found. Try searching with a different keyword.</p>
            <?php endif; ?>
        </div>
    </section>


</body>
</html>


