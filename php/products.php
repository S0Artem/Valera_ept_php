<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "valera_ept_php"); 
$sql = "SELECT * FROM product";
if($result = $conn->query($sql)){
    $products = [];
    foreach($result as $row){
        $products[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'prise' => $row['prise'], 
            'amount' => $row['amount'] 
        ];
    }
}
$result->free();


$sectinProduct = '';
ob_start();
foreach ($products as $product) {
    ?>
    <ul style="width: 18rem;">
        <div>
            <h2>Имя: <?php echo htmlspecialchars($product['name']); ?></h2>
            <li>Стоимость: <?php echo number_format($product['prise'], 0, ',', ' '); ?> тугриков</li>
            <li>Количество: <?php echo $product['amount']; ?></li>
            <?php if ($product['amount'] > 0): ?>
                <form action="./php/order.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>" style="display: none">
                    <button type="submit" class="btn btn-primary mt-2">Купить</button>
                </form>
            <?php else: ?>
                <p>Товар не доступен для покупки.</p>
            <?php endif; ?>
        </div>
    </ul>
    <?php
}
$sectinProduct = ob_get_clean();