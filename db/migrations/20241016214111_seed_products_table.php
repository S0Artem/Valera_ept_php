<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

class SeedProductsTable extends AbstractMigration
{
    public function up(): void
    {
        // Данные, которые мы хотим вставить
        $data = [
            [
                'name' => 'Product 1',
                'prise' => 19.99,
                'amount' => 20,
            ],
            [
                'name' => 'Product 2',
                'prise' => 19.99,
                'amount' => 20,
            ],
            [
                'name' => 'Product 3',
                'prise' => 19.99,
                'amount' => 20,
            ],
            [
                'name' => 'Product 4',
                'prise' => 19.99,
                'amount' => 20,
            ],
            [
                'name' => 'Product 5',
                'prise' => 19.99,
                'amount' => 20,
            ],
            [
                'name' => 'Product 6',
                'prise' => 19.99,
                'amount' => 20,
            ],
        ];

        // Вставляем данные в таблицу products
        $this->table('product')->insert($data)->saveData();
    }

    public function down(): void
    {
        // Очищаем таблицу, если нужно откатить миграцию
        $this->execute('DELETE FROM product');
    }
}
