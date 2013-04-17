<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

  public $hasAndBelongsToMany = array(
                                      'Team' => array(
                                                      'className'              => 'Team',
                                                      'joinTable'              => 'user_team_v',
                                                      'foreignKey'             => 'user_id',
                                                      'associationForeignKey'  => 'team_id',
                                                      'unique'                 => true,
                                                      'conditions'             => '',
                                                      'fields'                 => '',
                                                      'order'                  => '',
                                                      'limit'                  => '',
                                                      'offset'                 => '',
                                                      'finderQuery'            => '',
                                                      'deleteQuery'            => '',
                                                      'insertQuery'            => ''
                                                      ),

                                      'Role' => array(
                                                      'className'              => 'Role',
                                                      'joinTable'              => 'user_role_v',
                                                      'foreignKey'             => 'user_id',
                                                      'associationForeignKey'  => 'role_id',
                                                      'unique'                 => true,
                                                      'conditions'             => '',
                                                      'fields'                 => '',
                                                      'order'                  => '',
                                                      'limit'                  => '',
                                                      'offset'                 => '',
                                                      'finderQuery'            => '',
                                                      'deleteQuery'            => '',
                                                      'insertQuery'            => ''
                                                      ),

                                      'Acode' => array(
                                                       'className'              => 'Acode',
                                                       'joinTable'              => 'user_acode_v',
                                                       'foreignKey'             => 'user_id',
                                                       'associationForeignKey'  => 'acode_id',
                                                       'unique'                 => true,
                                                       'conditions'             => '',
                                                       'fields'                 => '',
                                                       'order'                  => '',
                                                       'limit'                  => '',
                                                       'offset'                 => '',
                                                       'finderQuery'            => '',
                                                       'deleteQuery'            => '',
                                                       'insertQuery'            => ''
                                                       )
                                      );

  public $hasMany = array(
                          'UserVer' => array(
                                             'foreignKey' => 'user_id'
                                             ));

  var $useTable = 'user_v';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'login';


}
