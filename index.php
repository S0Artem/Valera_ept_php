<?php
include_once "./php/controller/Database.php";
include_once "./php/controller/RenderShopeBlock.php";
include_once "./database.php";
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
            $db = new DataBase(HOST_DB, USER_DB, PASSWORD_DB, DATABASE_DB);
            $sql = $db->query("SELECT * FROM product");
            $shope = new RenderShopeBlock($sql);
            $shope->render();
            $db->close();
            ?>
        </section>
    </main>
</body>
</html>