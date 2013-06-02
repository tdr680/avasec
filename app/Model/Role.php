<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 * @property Acode $Acode
 * @property Role $Role
 * @property User $User
 */
class Role extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'role';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'extid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'charid' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Acode' => array(
			'className' => 'Acode',
			'joinTable' => 'role_acode',
			'foreignKey' => 'role_id',
			'associationForeignKey' => 'acode_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Role' => array(
			'className' => 'Role',
			'joinTable' => 'role_role',
			'foreignKey' => 'role_1_id',
			'associationForeignKey' => 'role_2_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_role',
			'foreignKey' => 'role_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);


  public function retrieveById($role_id) {
    if (!$this->exists($role_id)) {
      throw new NotFoundException(__('Invalid role'));
    }
    return $this->findById($role_id);
  }

  private function arrayOfId($a) {
    for ($i=0; $i<count($a); $i++) {
      $e = $a[$i];
      $r[] = $e['id'];
    }
    return $r;
  }

/**
 * Compare two roles regarding their access codes
 *
 * @var role_1_id
 * @var role_2_id
 */
  public function acode_diff($role_1_id, $role_2_id) {
    $role_1 = $this->retrieveById($role_1_id);
    $role_2 = $this->retrieveById($role_2_id);

    $acode_1 = $this->arrayOfId($role_1['Acode']);
    $acode_2 = $this->arrayOfId($role_2['Acode']);
    
    return array_diff($acode_1, $acode_2);
  }

/**
 * Compare two roles regarding their users
 *
 * @var role_1_id
 * @var role_2_id
 */
  public function user_diff($role_1_id, $role_2_id) {
    $role_1 = $this->retrieveById($role_1_id);
    $role_2 = $this->retrieveById($role_2_id);

    $user_1 = $this->arrayOfId($role_1['User']);
    $user_2 = $this->arrayOfId($role_2['User']);
    
    return array_diff($user_1, $user_2);
  }

}
