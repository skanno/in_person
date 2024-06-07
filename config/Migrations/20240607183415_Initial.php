<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up(): void
    {
        $this->table('genders', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->create();

        $this->table('person_links', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('from_person_id', 'biginteger', [
                'comment' => '(from)',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('to_person_id', 'biginteger', [
                'comment' => '(to)',
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
            ->addIndex(
                [
                    'from_person_id',
                    'to_person_id',
                ],
                [
                    'name' => 'from_person_id',
                    'unique' => true,
                ]
            )
            ->addIndex(
                [
                    'to_person_id',
                ],
                [
                    'name' => 'to_person_id',
                ]
            )
            ->create();

        $this->table('persons', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('internal_id', 'string', [
                'default' => null,
                'limit' => 254,
                'null' => false,
            ])
            ->addColumn('second_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 254,
                'null' => false,
            ])
            ->addColumn('is_confirm_email', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('nick_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('gender_id', 'biginteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'email',
                ],
                [
                    'name' => 'email',
                    'unique' => true,
                ]
            )
            ->addIndex(
                [
                    'internal_id',
                ],
                [
                    'name' => 'internal_id',
                    'unique' => true,
                ]
            )
            ->addIndex(
                [
                    'gender_id',
                ],
                [
                    'name' => 'gender_id',
                ]
            )
            ->create();

        $this->table('service_links', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('person_id', 'biginteger', [
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('service_id', 'biginteger', [
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addIndex(
                [
                    'person_id',
                    'service_id',
                ],
                [
                    'name' => 'person_id',
                    'unique' => true,
                ]
            )
            ->addIndex(
                [
                    'service_id',
                ],
                [
                    'name' => 'service_id',
                ]
            )
            ->create();

        $this->table('services', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('url', 'string', [
                'comment' => 'URL',
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->create();

        $this->table('person_links')
            ->addForeignKey(
                'from_person_id',
                'persons',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'person_links_ibfk_1'
                ]
            )
            ->addForeignKey(
                'to_person_id',
                'persons',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'person_links_ibfk_2'
                ]
            )
            ->update();

        $this->table('persons')
            ->addForeignKey(
                'gender_id',
                'genders',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'persons_ibfk_1'
                ]
            )
            ->update();

        $this->table('service_links')
            ->addForeignKey(
                'person_id',
                'persons',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'service_links_ibfk_1'
                ]
            )
            ->addForeignKey(
                'service_id',
                'services',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'service_links_ibfk_2'
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down(): void
    {
        $this->table('person_links')
            ->dropForeignKey(
                'from_person_id'
            )
            ->dropForeignKey(
                'to_person_id'
            )->save();

        $this->table('persons')
            ->dropForeignKey(
                'gender_id'
            )->save();

        $this->table('service_links')
            ->dropForeignKey(
                'person_id'
            )
            ->dropForeignKey(
                'service_id'
            )->save();

        $this->table('genders')->drop()->save();
        $this->table('person_links')->drop()->save();
        $this->table('persons')->drop()->save();
        $this->table('service_links')->drop()->save();
        $this->table('services')->drop()->save();
    }
}
