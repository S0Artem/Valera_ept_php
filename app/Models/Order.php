<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/ConnectBD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database.php";

function ProductsModell() {
    $id = (int) $_POST['id'];
    $db = new mysqli(HOST_DB, USER_DB, PASSWORD_DB, DATABASE_DB);
    $stmt = $db->prepare("SELECT id, name, prise, amount FROM product WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
    $db->close();
    return $data;
}
