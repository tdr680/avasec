<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('AppController', 'Controller');

class AjaxController extends AppController {

  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');
  public $uses = array('Team', 'Entity', 'Acode', 'Role', 'User');

  public function test() {
    $this->layout = null;

    $id = $_POST['id'];
    $t = $this->Team->findById($id);

    /* $data = Array( */
    /*               "name" => "Sergio", */
    /*               "age" => 23 */
    /*               ); */

    $this->set('test', $t);
    $this->render('/Ajax/test');
  }
}

