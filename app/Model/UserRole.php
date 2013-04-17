<?php
App::uses('AppModel', 'Model');
/**
 * UserRole Model
 *
 */
class UserRole extends AppModel {

  var $useTable = 'user_role';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'role_id';
}