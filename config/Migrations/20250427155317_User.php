<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class User extends BaseMigration
{
    public function change(): void
    {
        $this->table('user')
            ->addColumn('name','string', ['limit' => 100, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 150,'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addIndex(['email'], ['unique' => true])
            ->create();
    }
}
