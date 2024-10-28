<?php
include 'connect.php';
include 'functions.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $searchResults = searchProducts($keyword);
    
    echo "<h2>Search Results</h2>";
    if ($searchResults) {
        foreach ($searchResults as $product) {
            echo "<p>{$product['name']} - {$product['price']} - {$product['category']}</p>";
        }
    } else {
        echo "<p>No products found.</p>";
    }
}
?>
<a href="index.php">Back to Catalog</a>
