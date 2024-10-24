<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Models/Products.php";
function Products(){
    $sql = ProductsModell();
    while ($row = mysqli_fetch_assoc($sql)) {
        $products[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'prise' => $row['prise'],
            'amount' => $row['amount']
        ];
    }
    if (!empty($products))
        {
            ob_start();
            echo '<ul style="width: 18rem;">';
            foreach ($products as $product) {
                echo '<div>';
                echo '<h2>Имя: ' . htmlspecialchars($product['name']) . '</h2>';
                echo '<li>Стоимость: ' . number_format($product['prise'], 0, ',', ' ') . ' тугриков</li>';
                echo '<li>Количество: ' . htmlspecialchars($product['amount']) . '</li>';
                
                if ($product['amount'] > 0) {
                    echo '<form action="/Order" method="POST">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($product['id']) . '" style="display: none">';
                    echo '<button type="submit" class="btn btn-primary mt-2">Купить</button>';
                    echo '</form>';
                } else {
                    echo '<p>Товар не доступен для покупки.</p>';
                }

                echo '</div>';
            }
            echo '</ul>';
            
            $sectinProduct = ob_get_clean();
            echo $sectinProduct;
        }
        else
        {
            echo "Нет доступных товаров.";
        }
}