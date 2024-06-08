<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Services seed.
 */
class ServicesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'X', 'url' => 'https://x.com'],
            ['id' => 2, 'name' => 'Facebook', 'url' => 'https://facebook.com'],
        ];

        $table = $this->table('services');
        $table->insert($data)->save();
    }
}
