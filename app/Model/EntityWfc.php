<?php
App::uses('Entity', 'Model');
/**
 * Secured entity model
 *
 */
class EntityWfc extends Entity {

  public $useTable = 'entity_wfc_v';

  public $belongsTo = array(
                            'Mtyp' => array(
                                            'className'   => 'EntityMtyp',
                                            'foreignKey'  => false,
                                            'conditions'  => array('EntityWfc.meta_typ_id = Mtyp.extid')
                                            )
                            );

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'id';
}
