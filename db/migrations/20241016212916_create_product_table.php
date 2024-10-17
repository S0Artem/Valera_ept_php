<?php
use Phinx\Migration\AbstractMigration;

class CreateProductTable  extends AbstractMigration
{
    public function change()
    {
        // Пример создания таблицы
        $table = $this->table('product');
        $table->addColumn('name', 'string')
              ->addColumn('prise', 'integer')
              ->addColumn('amount', 'integer')
              ->create();
    }
    public function down(): void
    {
        $table = $this->table('product');
        $table->removeColumn('name')
              ->removeColumn('prise')
              ->removeColumn('amount')
              ->update();
    }
}