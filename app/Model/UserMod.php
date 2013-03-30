<?php
App::uses('AppModel', 'Model');
/**
 * UserMod Model
 *
 */
class UserMod extends AppModel {

  public $validate = array(
                           'login' => array(
                                            'rule'   => 'notEmpty'
                                            )
                           );

  var $useTable = 'user';
}
