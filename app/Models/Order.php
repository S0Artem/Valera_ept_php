<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/ConnectBD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database.php";
function OrderModell() {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : (isset($_SESSION['order_data']['id']) ? $_SESSION['order_data']['id'] : null);
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
    if (!empty($data)) {
        $_SESSION['order_data'] = $data[0]; // Сохраняем только первый элемент (если есть)
    }
    return $data;
}