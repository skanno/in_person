<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TemporaryTokensFixture
 */
class TemporaryTokensFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'person_id' => 1,
                'token' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-06-09 07:48:32',
            ],
        ];
        parent::init();
    }
}
