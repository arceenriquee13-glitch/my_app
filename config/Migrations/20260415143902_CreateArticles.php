<?php
declare(strict_types=1);

// config/Migrations/20240124000000_CreateArticles.php
use Migrations\BaseMigration;

class CreateArticles extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('articles');
        $table->addColumn('title', 'string', ['limit' => 255])
            ->addColumn('slug', 'string', ['limit' => 191])
            ->addColumn('body', 'text', ['null' => true])
            ->addColumn('published', 'boolean', ['default' => false])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addIndex(['slug'], ['unique' => true])
            ->create();
    }
}