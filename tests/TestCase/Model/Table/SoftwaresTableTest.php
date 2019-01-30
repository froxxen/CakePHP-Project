<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SoftwaresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SoftwaresTable Test Case
 */
class SoftwaresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SoftwaresTable
     */
    public $Softwares;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.softwares',
        'app.connections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Softwares') ? [] : ['className' => SoftwaresTable::class];
        $this->Softwares = TableRegistry::get('Softwares', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Softwares);

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
