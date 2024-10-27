<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/ConnectBD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/products/Products.php";

class Products
{

    public function productsDb()
    {
        $db = new DataBase(HOST_DB, USER_DB, PASSWORD_DB, DATABASE_DB);
        $sql = $db->query("SELECT * FROM product");    
        $db->close();
        return $sql;
    }

    public function products()
    {
        $sql = $this->productsDb();


        $products = []; // Инициализация массива
        while ($row = mysqli_fetch_assoc($sql)) {
            $products[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'prise' => $row['prise'], // исправлено на 'price'
                'amount' => $row['amount']
            ];
        }
        if (!empty($products)) {
            return $products;
        } else {
            echo "Нет доступных товаров.";
        }
    }
}