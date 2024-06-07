<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonsFixture
 */
class PersonsFixture extends TestFixture
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
                'internal_id' => 'Lorem ipsum dolor sit amet',
                'second_name' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'is_confirm_email' => 1,
                'password' => 'Lorem ipsum dolor sit amet',
                'nick_name' => 'Lorem ipsum dolor sit amet',
                'gender_id' => 1,
                'created' => '2024-06-07 18:01:38',
                'modified' => '2024-06-07 18:01:38',
            ],
        ];
        parent::init();
    }
}
