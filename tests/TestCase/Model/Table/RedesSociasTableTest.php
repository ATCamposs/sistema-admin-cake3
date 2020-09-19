<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RedesSociasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RedesSociasTable Test Case
 */
class RedesSociasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RedesSociasTable
     */
    public $RedesSocias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.redes_socias',
        'app.situations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RedesSocias') ? [] : ['className' => RedesSociasTable::class];
        $this->RedesSocias = TableRegistry::getTableLocator()->get('RedesSocias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RedesSocias);

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
