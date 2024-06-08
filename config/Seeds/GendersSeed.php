<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Genders seed.
 */
class GendersSeed extends AbstractSeed
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
            ['id' => 1, 'name' => '男性'],
            ['id' => 2, 'name' => '女性'],
            ['id' => 3, 'name' => 'どちらでもない'],
        ];

        $table = $this->table('genders');
        $table->insert($data)->save();
    }
}
