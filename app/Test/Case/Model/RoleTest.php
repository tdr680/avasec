<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('Role', 'Model');

/**
 * Role Test Case
 *
 */
class RoleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.role',
		'app.acode',
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
		$this->Role = ClassRegistry::init('Role');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Role);

		parent::tearDown();
	}

/**
 * testAcodeDiff method
 *
 * @return void
 */
	public function testAcodeDiff() {
      $role_1_id = 55015;
      $role_2_id = 55016;

      firecake($this->Role->acode_diff($role_1_id, $role_2_id));
      firecake($this->Role->acode_diff($role_2_id, $role_1_id));
	}

/**
 * testUserDiff method
 *
 * @return void
 */
	public function testUserDiff() {
      $role_1_id = 55015;
      $role_2_id = 55016;

      firecake($this->Role->user_diff($role_1_id, $role_2_id));
      firecake($this->Role->user_diff($role_2_id, $role_1_id));
	}

}
