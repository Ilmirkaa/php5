<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=practici", "root", "root");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>