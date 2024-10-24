<?php
session_start();
if (isset($_SESSION['message'])) {
    echo "<div>{$_SESSION['message']}</div>"; // Выводим сообщение
    unset($_SESSION['message']); // Удаляем сообщение из сессии
}
function OrderId(){
    $product = OrderModell();
    $id = null; // Инициализация переменной
    foreach ($product as $row) {
        if (isset($row['id'])) {
            $id = $row['id'];
        }
    }
    return $id;
}

function OrderName(){
    $product = OrderModell();
    $name = null;
    foreach ($product as $row) {
        if (isset($row['name'])) {
            $name = $row['name'];
        }
    }
    return $name;
}

function OrderPrise(){
    $product = OrderModell();
    $prise = null;
    foreach ($product as $row) {
        if (isset($row['prise'])) {
            $prise = $row['prise'];
        }
    }
    return $prise;
}

function OrderAmount(){
    $product = OrderModell();
    $amount = null;
    foreach ($product as $row) {
        if (isset($row['amount'])) {
            $amount = $row['amount'];
        }
    }
    return $amount;
}
