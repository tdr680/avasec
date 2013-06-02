<?php
App::uses('ComponentCollection', 'Controller');
App::uses('Component', 'Controller');
App::uses('DiffCartComponent', 'Controller/Component');

/**
 * DiffCartComponent Test Case
 *
 */
class DiffCartComponentTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$Collection = new ComponentCollection();
		$this->DiffCart = new DiffCartComponent($Collection);
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
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
      $this->DiffCart->add("Role 2", "/avasec/users/view/2");
      $this->DiffCart->add("Role 3", "/avasec/users/view/3");
      $this->DiffCart->add("Role 1", "/avasec/users/view/1");
      $this->DiffCart->add("Role 4", "/avasec/users/view/4");

      $this->DiffCart->add("Role 5", "/avasec/users/view/0");
      $this->DiffCart->add("Role 5", "/avasec/users/view/5");

      $this->DiffCart->add("Entity 3", "/avasec/users/view/3");
      $this->DiffCart->add("Entity 1", "/avasec/users/view/1");
      $this->DiffCart->add("Entity 2", "/avasec/users/view/2");

      $this->DiffCart->toString();
	}


/**
 * testMultiply method
 *
 * @return void
 */
	public function testMultiply() {
      $result = $this->DiffCart->multiply(6, 7);
      $this->assertEquals($result, 42);
	}

}
