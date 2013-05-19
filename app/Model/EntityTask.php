<?php
App::uses('Entity', 'Model');
/**
 * Secured entity model
 *
 */
class EntityTask extends Entity {

  public $useTable = 'entity_task_v';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'id';
}
