<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepoimentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepoimentosTable Test Case
 */
class DepoimentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepoimentosTable
     */
    public $Depoimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.depoimentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Depoimentos') ? [] : ['className' => DepoimentosTable::class];
        $this->Depoimentos = TableRegistry::getTableLocator()->get('Depoimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Depoimentos);

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
