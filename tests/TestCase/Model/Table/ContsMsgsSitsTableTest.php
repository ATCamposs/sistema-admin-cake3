<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContsMsgsSitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContsMsgsSitsTable Test Case
 */
class ContsMsgsSitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContsMsgsSitsTable
     */
    public $ContsMsgsSits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.conts_msgs_sits',
        'app.colors',
        'app.contatos_msgs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContsMsgsSits') ? [] : ['className' => ContsMsgsSitsTable::class];
        $this->ContsMsgsSits = TableRegistry::getTableLocator()->get('ContsMsgsSits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContsMsgsSits);

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
