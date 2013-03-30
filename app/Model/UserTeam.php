<?php
App::uses('AppModel', 'Model');
/**
 * UserTeam Model
 *
 */
class UserTeam extends AppModel {

  var $useTable = 'user_team';

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'team_id';

  // App::uses('UserTeam', 'Model');
  // $ut = new UserTeam;
  // print_r($ut->find('all', array('conditions'=>array('team_id'=>3))));

}
