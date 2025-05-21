<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Post extends BaseMigration
{
    public function change(): void
    {
        $this->table('post')
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('title', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('subtitle', 'string', ['limit' => 525, 'null' => false])
            ->addColumn('content', 'text')
            ->addTimestamps()
            ->addForeignKey('user_id', 'user', 'id', [
                'delete'=> 'CASCADE', // se um user for deletado, os posts também
                'update'=> 'NO_ACTION'
            ])
            ->create();
    }
}
