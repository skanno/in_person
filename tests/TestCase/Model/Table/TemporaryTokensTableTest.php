<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TemporaryTokensTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TemporaryTokensTable Test Case
 */
class TemporaryTokensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TemporaryTokensTable
     */
    protected $TemporaryTokens;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.TemporaryTokens',
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
        $config = $this->getTableLocator()->exists('TemporaryTokens') ? [] : ['className' => TemporaryTokensTable::class];
        $this->TemporaryTokens = $this->getTableLocator()->get('TemporaryTokens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TemporaryTokens);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TemporaryTokensTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TemporaryTokensTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
