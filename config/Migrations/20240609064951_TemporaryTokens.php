<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class TemporaryTokens extends AbstractMigration
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
        $this->table('temporary_tokens')
            ->addColumn('person_id', 'biginteger', [
                'comment' => 'person_id',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('token', 'string', [
                'comment' => `token`,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addForeignKey(
                'person_id',
                'persons',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->create();
    }
}
