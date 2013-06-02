<?php
App::uses('Entity', 'Model');

/**
 * Entity Test Case
 *
 */
class EntityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entity',
		'app.acode',
		'app.acode_entity',
		'app.role',
		'app.role_acode',
		'app.role_role',
		'app.user',
		'app.user_acode',
		'app.user_role',
		'app.team',
		'app.user_team'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Entity = ClassRegistry::init('Entity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Entity);

		parent::tearDown();
	}

}
