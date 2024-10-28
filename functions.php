<?php
include 'connect.php';

function addProduct($name, $description, $price, $category) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, category) VALUES (:name, :description, :price, :category)");
    $stmt->execute([':name' => $name, ':description' => $description, ':price' => $price, ':category' => $category]);
}

function getCatalog() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchProducts($keyword) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE :keyword OR description LIKE :keyword");
    $stmt->execute([':keyword' => '%' . $keyword . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function filterProducts($category = null, $minPrice = 0, $maxPrice = 9999) {
    global $pdo;
    $query = "SELECT * FROM products WHERE price BETWEEN :minPrice AND :maxPrice";
    $params = [':minPrice' => $minPrice, ':maxPrice' => $maxPrice];

    if ($category) {
        $query .= " AND category = :category";
        $params[':category'] = $category;
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
