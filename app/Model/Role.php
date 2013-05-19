<?php
App::uses('AppModel', 'Model');
/**
 * Access code model
 *
 */
class Role extends AppModel {

  public $hasAndBelongsToMany = 
    array(
          'Acode' => array(
                            'className'              => 'Acode',
                            'joinTable'              => 'role_acode',
                            'foreignKey'             => 'role_id',
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
                           ),
          'User' => array(
                          'className'              => 'User',
                          'joinTable'              => 'user_role_v',
                          'foreignKey'             => 'role_id',
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

  
  public $useTable = 'role';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'name';
}
