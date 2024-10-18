<?
class RenderShopeBlock {
    private $sql;

    public function __construct($sql) {
        $this->sql = $sql;
    }

    private function show() {
        $products = [];
        if ($this->sql) {
            while ($row = mysqli_fetch_assoc($this->sql)) {
                $products[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'prise' => $row['prise'],
                    'amount' => $row['amount']
                ];
            }
            mysqli_free_result($this->sql);
        }
        return $products;
    }

    public function render() {
        $products = $this->show();
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
                    echo '<form action="./php/order.php" method="POST">';
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
}