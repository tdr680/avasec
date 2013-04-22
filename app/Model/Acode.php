<?php
App::uses('AppModel', 'Model');
/**
 * Access code model
 *
 */
class Acode extends AppModel {

  public $hasAndBelongsToMany = 
    array(
          'Entity' => array(
                            'className'              => 'Entity',
                            'joinTable'              => 'acode_entity',
                            'foreignKey'             => 'acode_id',
                            'associationForeignKey'  => 'entity_id',
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
                          'joinTable'              => 'role_acode',
                          'foreignKey'             => 'acode_id',
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
          'User' => array(
                          'className'              => 'User',
                          'joinTable'              => 'user_acode_v',
                          'foreignKey'             => 'acode_id',
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

  
  public $useTable = 'acode';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'id';
}
