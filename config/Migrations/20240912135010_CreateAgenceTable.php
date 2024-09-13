<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAgenceTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('agences');
        $table->addColumn('name','string');
        $table->addColumn('ville','string', [
            'default' => null,
            'null' => false,
            'limit' => 255
        ]);
        $table->addColumn('adresse','string', [
            'default' => null,
            'null' => false,
            'limit' => 255
        ]);
        $table->addColumn('email','string', [
            'default' => true,
            'null'  => false,
            'limit' => 255
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addIndex(['email'], ['unique' => true]);
        $table->create();
    }
}
