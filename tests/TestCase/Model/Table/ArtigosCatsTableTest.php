<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArtigosCatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArtigosCatsTable Test Case
 */
class ArtigosCatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArtigosCatsTable
     */
    public $ArtigosCats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.artigos_cats',
        'app.situations',
        'app.artigos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArtigosCats') ? [] : ['className' => ArtigosCatsTable::class];
        $this->ArtigosCats = TableRegistry::getTableLocator()->get('ArtigosCats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArtigosCats);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
