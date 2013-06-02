<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('DiffCartHelper', 'View/Helper');

/**
 * DiffCartHelper Test Case
 *
 */
class DiffCartHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->DiffCart = new DiffCartHelper($View);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DiffCart);

		parent::tearDown();
	}

/**
 * testShow method
 *
 * @return void
 */
	public function testShow() {
      $result = $this->DiffCart->show();
      $this->assertContains('C A R T', $result);
	}

}
