<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersdetailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersdetailTable Test Case
 */
class OrdersdetailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersdetailTable
     */
    public $Ordersdetail;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ordersdetail',
        'app.Products',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ordersdetail') ? [] : ['className' => OrdersdetailTable::class];
        $this->Ordersdetail = TableRegistry::getTableLocator()->get('Ordersdetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ordersdetail);

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
