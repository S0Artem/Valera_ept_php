<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "valera_ept_php"); 

// Получаем данные из POST-запроса
$idProduct = $_POST['idProduct'];
$prise = $_POST['prise'];
$amount = $_POST['amount'];
$amountProduct = $_POST['amountProduct'];
$newAmountProduct = $amountProduct - $amount;
$totalAmount = $prise * $amount;


$sql = "INSERT INTO `order` (idProduct, prise, amount) VALUES (?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {

    
    $stmt->bind_param("idd", $idProduct, $prise, $totalAmount);

    
    if ($stmt->execute()) {
        echo "Запись успешно добавлена!";
        
        
        $updateSql = "UPDATE product SET amount = ? WHERE id = ?";
        if ($stmtProd = $conn->prepare($updateSql)) {

            
            $stmtProd->bind_param("di", $newAmountProduct, $idProduct);

            
            if ($stmtProd->execute()) {
                echo "Продукт успешно обновлен!";
            } else {
                echo "Ошибка при обновлении продукта: " . $stmtProd->error;
            }

            
            $stmtProd->close();
        } else {
            echo "Ошибка подготовки запроса для обновления: " . $conn->error;
        }

    } else {
        echo "Ошибка при добавлении записи: " . $stmt->error;
    }

    
    $stmt->close();
} else {
    echo "Ошибка: " . $conn->error;
}


$conn->close();
?>