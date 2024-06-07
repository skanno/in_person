<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServiceLinksFixture
 */
class ServiceLinksFixture extends TestFixture
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
                'service_id' => 1,
            ],
        ];
        parent::init();
    }
}
