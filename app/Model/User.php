<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

  public $hasAndBelongsToMany = array(
                                      'MemberOf' => array(
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
                                                        )
                                      );

  var $useTable = 'user_v';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'login';


}
