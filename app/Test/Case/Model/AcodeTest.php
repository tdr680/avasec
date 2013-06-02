<?php
App::uses('Acode', 'Model');

/**
 * Acode Test Case
 *
 */
class AcodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acode',
		'app.entity',
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
		$this->Acode = ClassRegistry::init('Acode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Acode);

		parent::tearDown();
	}

}
