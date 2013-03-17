<?php
App::uses('AppModel', 'Model');
/**
 * Team Model
 *
 */
class Team extends AppModel {

  public $hasAndBelongsToMany = array(
                                      'Member' => array(
                                                        'className'              => 'User',
                                                        'joinTable'              => 'user_team_v',
                                                        'foreignKey'             => 'team_id',
                                                        'associationForeignKey'  => 'user_id',
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

  public $useTable = 'team';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'name';


}
