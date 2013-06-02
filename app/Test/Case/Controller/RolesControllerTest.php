<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('RolesController', 'Controller');

/**
 * RolesController Test Case
 *
 */
class RolesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	/* public $fixtures = array( */
	/* 	'app.role', */
	/* 	'app.acode', */
	/* 	'app.entity', */
	/* 	'app.acode_entity', */
	/* 	'app.role_acode', */
	/* 	'app.user', */
	/* 	'app.user_ver', */
	/* 	'app.team', */
	/* 	'app.user_team_v', */
	/* 	'app.user_team', */
	/* 	'app.user_role', */
	/* 	'app.user_role_v', */
	/* 	'app.user_acode_v' */
	/* ); */

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
      $result = $this->testAction('/roles/index');
      // debug($result);
      firecake($result, 'RolesController->testIndex');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}
