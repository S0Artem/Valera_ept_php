<?php
include_once "./php/products.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка пользователя</title>
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="#">Товары</a>
            </li>
            <php? 

            ?>
        </ul>
    </header>
    <main>
    <section>
            <?php
            if (isset($sectinProduct) && !empty($sectinProduct)) {
                echo $sectinProduct;
            } else {
                echo "Нет доступных товаров.";
            }
            ?>
        </section>
    </main>
</body>
</html>