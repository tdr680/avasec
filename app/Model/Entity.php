<?php
App::uses('AppModel', 'Model');
/**
 * Secured entity model
 *
 */
class Entity extends AppModel {

  public $actsAs = array('Search.Searchable');

  public $filterArgs = array('name'  => array('type' => 'like'));
							 
  
  public $hasAndBelongsToMany = 
    array(
          'Acode' => array(
                           'className'              => 'Acode',
                           'joinTable'              => 'acode_entity',
                           'foreignKey'             => 'entity_id',
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

  public $validate = 
    array(
          'name' => array(
                          'rule'   => 'notEmpty'
                          )
          );

  public $useTable = 'entity';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'name';
}
