<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonLinksFixture
 */
class PersonLinksFixture extends TestFixture
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
                'from_person_id' => 1,
                'to_person_id' => 1,
                'created' => '2024-06-07 18:01:38',
            ],
        ];
        parent::init();
    }
}
