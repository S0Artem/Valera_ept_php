<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Controllers/Order.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Models/Order.php";
$id =  OrderId();
$name =  OrderName();
$prise =  OrderPrise();
$amount = OrderAmount();
?>
<form method="POST" action="./add_purchase.php">
    <input type="hidden" name="idProduct" value="<?php echo isset($id) ? $id : ''; ?>">
    <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" readonly>
    <input type="text" name="prise" value="<?php echo isset($prise) ? $prise : ''; ?>" readonly>
    <input type="text" name="amountProduct"value="<?php echo isset($amount) ? $amount : ''; ?>" readonly>
    <input type="number" name="amount" placeholder="Введите количество" required max="<?php echo isset($amount) ? $amount : 0; ?>">
    <button type="submit" name="submit">Добавить запись</button>
</form>