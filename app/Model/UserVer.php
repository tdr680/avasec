<?php
App::uses('AppModel', 'Model');
/**
 * UserVer Model
 *
 */
class UserVer extends AppModel {

  public $validate = array(
                           'name' => array(
                                           'rule'   => 'notEmpty'
                                           )
                           );

  public $belongsTo = 'User';
  public $hasAndBelongsToMany = array('Team' => 
                                      array(
                                            'className' => 'Team',
                                            'joinTable' => 'user_team'));

  var $useTable = 'user_ver';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'user_id';

  // App::uses('UserVer', 'Model');
  // $uv = new UserVer;
  // print_r($uv->find('all', array('conditions'=>array('user_id'=>3))));

}
