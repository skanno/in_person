<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonLinksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonLinksTable Test Case
 */
class PersonLinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonLinksTable
     */
    protected $PersonLinks;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.PersonLinks',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PersonLinks') ? [] : ['className' => PersonLinksTable::class];
        $this->PersonLinks = $this->getTableLocator()->get('PersonLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PersonLinks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PersonLinksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PersonLinksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
