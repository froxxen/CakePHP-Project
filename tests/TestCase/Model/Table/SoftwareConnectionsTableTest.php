<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SoftwareConnectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SoftwareConnectionsTable Test Case
 */
class SoftwareConnectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SoftwareConnectionsTable
     */
    public $SoftwareConnections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.software_connections',
        'app.softwares',
        'app.devices',
        'app.connections',
        'app.offices',
        'app.rooms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SoftwareConnections') ? [] : ['className' => SoftwareConnectionsTable::class];
        $this->SoftwareConnections = TableRegistry::get('SoftwareConnections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SoftwareConnections);

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
