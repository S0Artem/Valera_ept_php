<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/ConnectBD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database.php";
function ProductsModell(){
    $db = new DataBase(HOST_DB, USER_DB, PASSWORD_DB, DATABASE_DB);
    $sql = $db->query("SELECT * FROM product");
    $db->close();
    return $sql;
}
