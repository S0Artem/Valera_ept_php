<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateOrderTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('order');
        $table->addColumn('idProduct', 'integer')
              ->addColumn('prise', 'integer')
              ->addColumn('amount', 'integer')
              ->create();
    }
    public function down(): void
    {
        {
            $table = $this->table('order');
            $table->removeColumn('idProduct')
                  ->removeColumn('prise')
                  ->removeColumn('amount')
                  ->update();
        }
    }
}
