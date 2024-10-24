<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Controllers/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Models/Order.php";
$id =  OrderId();
$name =  OrderName();
$prise =  OrderPrise();
$amount = OrderAmount();
?>
<form method="POST" action="/Order/Record">
    <input type="hidden" name="idProduct" value="<?php echo isset($id) ? $id : ''; ?>">
    <input type="text" name="nameProduct" value="<?php echo isset($name) ? $name : ''; ?>" readonly>
    <input type="text" name="priseProduct" value="<?php echo isset($prise) ? $prise : ''; ?>" readonly>
    <input type="text" name="amount" value="<?php echo isset($amount) ? $amount : ''; ?>" readonly>
    <input type="number" name="amountProduct" placeholder="Введите количество" required min = "1" step="1" max="<?php echo isset($amount) ? $amount : 0; ?>">
    <button type="submit" name="submit">Добавить запись</button>
</form>