<?php
echo ($_SERVER['REQUEST_URI']);
require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/Header.php";

if ($_SERVER['REQUEST_URI'] == "/"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/products/Products.php";
}

else if($_SERVER['REQUEST_URI'] == "/Order"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/order/Order.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Controllers/Order.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Models/Order.php";
}

else if($_SERVER['REQUEST_URI'] == "/Order/Record"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Models/Record.php";
}