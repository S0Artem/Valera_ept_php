<?php
// Установка соединения с базой данных
$conn = mysqli_connect("127.0.0.1", "root", "", "valera_ept_php"); 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT name, prise, amount FROM product WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc(); 

        if ($product) {
            $name = $product['name'];
            $prise = $product['prise'];
            $amount = $product['amount'];
        } else {
            echo "Продукт не найден.";
            exit;
        }

        $stmt->close();
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
?>

<form method="POST" action="./add_purchase.php">
    <input type="hidden" name="idProduct" value="<?php echo isset($id) ? $id : ''; ?>">
    <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" readonly>
    <input type="text" name="prise" value="<?php echo isset($prise) ? $prise : ''; ?>" readonly>
    <input type="text" name="amountProduct"value="<?php echo isset($amount) ? $amount : ''; ?>" readonly>
    <input type="number" name="amount" placeholder="Введите количество" required max="<?php echo isset($amount) ? $amount : 0; ?>">
    <button type="submit" name="submit">Добавить запись</button>
</form>

