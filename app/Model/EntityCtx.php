<?php
App::uses('Entity', 'Model');
/**
 * Secured entity model
 *
 */
class EntityCtx extends Entity {

  public $useTable = 'entity_ctx_v';


/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'id';
}
