<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <style>
       /* Общий стиль для страницы */
body {
    font-family: 'Roboto', sans-serif; /* Используем современный шрифт */
    background-image: linear-gradient(to right, #f0f4f8, #cfd9df); /* Градиентный фон */
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Контейнер */
.container {
    width: 90%;
    max-width: 1200px;
    background: #ffffff; /* Белый фон для контейнера */
    border-radius: 12px; /* Закругленные углы контейнера */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px auto;
}

/* Заголовки */
h1, h2 {
    text-align: center;
    color: #2c3e50; /* Темно-синий цвет для заголовков */
    margin-bottom: 20px;
}

/* Формы */
form {
    border: none;
    margin: 0 auto;
    padding: 20px;
}

/* Метки для формы */
form label {
    display: block;
    margin: 15px 0 5px;
    font-weight: 600; /* Увеличенная насыщенность */
}

/* Поля ввода */
form input[type="text"],
form input[type="number"],
form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #bdc3c7; /* Мягкая граница */
    border-radius: 6px; /* Закругленные углы для полей ввода */
    margin-bottom: 15px;
    transition: border-color 0.3s;
}

form input[type="submit"] {
    background-color: #3498db; /* Яркий синий цвет кнопки */
    color: #ffffff;
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    font-size: 16px;
    font-weight: bold; /* Жирный текст на кнопке */
}

form input[type="submit"]:hover {
    background-color: #2980b9; /* Темный синий при наведении */
    transform: translateY(-2px); /* Эффект увеличения */
}

/* Карточка товара */
.product-card {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 20px;
    margin: 15px 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

/* Список продуктов */
.product-list {
    width: 100%;
}

/* Новые стили для ссылок */
a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

/* Элементы списков */
.product-list p {
    margin: 10px 0;
}


    </style>
</head>

<body>

    <h1>Каталог</h1>

    <!-- Форма для добавления товара -->
    <h2>Добавления</h2>
    <form action="add_product.php" method="POST">
        <label for="name">Имя:</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Описание:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="price">Цена:</label>
        <input type="number" name="price" step="0.01" required>
        <br>
        <label for="category">Категория:</label>
        <input type="text" name="category" required>
        <br>
        <input type="submit" value="Add Product">
    </form>

    <!-- Форма для поиска товаров -->
    <h2>Поиск</h2>
    <form action="search.php" method="GET">
        <label for="keyword">Название:</label>
        <input type="text" name="keyword" required>
        <input type="submit" value="Search">
    </form>

    <!-- Форма для фильтрации товаров -->
    <h2>Фильтрация</h2>
    <form action="filter.php" method="GET">
        <label for="category">Категория:</label>
        <input type="text" name="category">
        <br>
        <label for="minPrice">Мин цена:</label>
        <input type="number" name="minPrice" step="0.01">
        <br>
        <label for="maxPrice">Макс цена:</label>
        <input type="number" name="maxPrice" step="0.01">
        <br>
        <input type="submit" value="Filter">
    </form>

    <!-- Вывод каталога -->
    <h2>Каталог</h2>
    <div class="tov">
        <?php
        include 'connect.php';
        include 'functions.php';

        $products = getCatalog();
        if ($products) {
            foreach ($products as $product) {
                echo "<p>{$product['name']} - {$product['price']} - {$product['category']}</p>";
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </div>

</body>

</html>