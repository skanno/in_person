<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiceLinksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiceLinksTable Test Case
 */
class ServiceLinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiceLinksTable
     */
    protected $ServiceLinks;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ServiceLinks',
        'app.Persons',
        'app.Services',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ServiceLinks') ? [] : ['className' => ServiceLinksTable::class];
        $this->ServiceLinks = $this->getTableLocator()->get('ServiceLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ServiceLinks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ServiceLinksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ServiceLinksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
