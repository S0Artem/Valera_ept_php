<?php
function OrderId(){
    $product = ProductsModell();
    $id = null; // Инициализация переменной
    foreach ($product as $row) {
        if (isset($row['id'])) {
            $id = $row['id'];
        }
    }
    return $id;
}

function OrderName(){
    $product = ProductsModell();
    $name = null;
    foreach ($product as $row) {
        if (isset($row['name'])) {
            $name = $row['name'];
        }
    }
    return $name;
}

function OrderPrise(){
    $product = ProductsModell();
    $prise = null;
    foreach ($product as $row) {
        if (isset($row['prise'])) {
            $prise = $row['prise'];
        }
    }
    return $prise;
}

function OrderAmount(){
    $product = ProductsModell();
    $amount = null;
    foreach ($product as $row) {
        if (isset($row['amount'])) {
            $amount = $row['amount'];
        }
    }
    return $amount;
}
