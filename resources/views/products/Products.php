<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Controllers/Products.php";
$products = new Products();
$products->products();
?>
<ul style="width: 18rem;">
    <?php foreach ($products as $product) {  ?>
        <div>
            <h2>Имя: <?php echo htmlspecialchars($product['name']) ?> </h2>
            <li>Стоимость: <?php echo number_format($product['prise'], 0, ',', ' ') ?> тугриков</li>
            <li>Количество: <?php echo htmlspecialchars($product['amount']) ?> </li>
            <?php if ($product['amount'] > 0) { ?>
                <form action="/Order" method="get">
                    <input type="hidden" name="id" value="<? echo htmlspecialchars($product['id']) ?>" style="display: none">
                    <button type="submit" class="btn btn-primary mt-2">Купить</button>
                </form>
            <?php } else { ?>
                <p>Товар не доступен для покупки.</p>
            <?php } ?>
        </div>
    <?php } ?>
</ul>