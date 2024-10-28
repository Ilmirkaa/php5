<?php
include 'connect.php';
include 'functions.php';

$category = isset($_GET['category']) ? $_GET['category'] : null;
$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : 0;
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : 9999;

$filteredProducts = filterProducts($category, $minPrice, $maxPrice);

echo "<h2>Filtered Products</h2>";
if ($filteredProducts) {
    foreach ($filteredProducts as $product) {
        echo "<p>{$product['name']} - {$product['price']} - {$product['category']}</p>";
    }
} else {
    echo "<p>No products found in this filter range.</p>";
}
?>
<a href="index.php">Back to Catalog</a>
