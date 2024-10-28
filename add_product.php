<?php
include 'connect.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    addProduct($name, $description, $price, $category);
    header("Location: index.php");
}
?>
