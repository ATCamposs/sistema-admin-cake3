<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArtigosTpsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArtigosTpsTable Test Case
 */
class ArtigosTpsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArtigosTpsTable
     */
    public $ArtigosTps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.artigos_tps',
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
        $config = TableRegistry::getTableLocator()->exists('ArtigosTps') ? [] : ['className' => ArtigosTpsTable::class];
        $this->ArtigosTps = TableRegistry::getTableLocator()->get('ArtigosTps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArtigosTps);

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
}
