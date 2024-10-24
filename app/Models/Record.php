<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/ConnectBD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database.php";
session_start();
$idProduct = (int) $_POST['idProduct'];
$amount = (int) $_POST['priseProduct'];
$prise = (int) $_POST['amountProduct'];
$totalPrise = $prise * $amount;
$db = new mysqli(HOST_DB, USER_DB, PASSWORD_DB, DATABASE_DB);
$stmt = $db->prepare("INSERT INTO `order` (idProduct, prise, amount) VALUES (?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("idd", $idProduct, $amount, $totalPrise);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Заказ успешно добавлен! 😊";
        header('Location: ' . "/Order");
    } else {
        echo "Ошибка при добавлении записи: " . $stmt->error;
    }
}
