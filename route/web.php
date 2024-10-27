<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/Header.php";

if ($url == "/"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Controllers/Products.php";
}

else if($url == "/Order"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/order/Order.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Controllers/Order.php";
    //только на контроллер
}

else if($url == "/Order/Record"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Controllers/Record.php";
}