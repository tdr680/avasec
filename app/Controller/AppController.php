<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

App::import('Lib', 'DebugKit.FireCake');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  public $components = 
    array(
          'DebugKit.Toolbar',
          'Session',
          'Auth' => 
          array(
                'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
                'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
                ),
          'DiffCart'
          );

  public function afterFilter() {
    $auth = Configure::read('Auth');
    if (is_array($auth)) {
      if (array_key_exists('User', $auth)) {
        firecake($auth['User']['username']);
      }
    } else {
      firecake('please log in');
    }

    //firecake($this->Session->read('visited'));
  }
  
  public function beforeFilter() {
 
    /* $this->Auth->allow('index', 'view', 'ver', 'display'); */
    /* $this->Auth->allow(); */
    $this->Auth->deny();

    /* firecake($this->Session, 'AppController->Session'); */

    $uri = $_SERVER['REQUEST_URI'];

    /* firecake($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); */

    /* http://stackoverflow.com/questions/6353778/cakephp-global-variables-in-model */
    if ( $this->Session->check('Auth') ) {
      $auth = $this->Session->read('Auth');
      if (is_array($auth)) {
        if (array_key_exists('User', $auth)) {
          /* http://stackoverflow.com/questions/16372645/cakephp-save-objects-state */
          Configure::write('Auth', $this->Session->read('Auth'));

          /* $visited = $this->Session->read('visited'); */
          /* if ($visited == null){ */
          /*   $visited = array(); */
          /* } */
      
          $this->DiffCart->setCart($this->Session->read('DiffCart'));
          $this->DiffCart->add($uri, $uri);
          /* $visited[] = $uri; */
          /* $this->Session->write('visited', $visited); */
          $this->Session->write('DiffCart', $this->DiffCart->getCart());
        }
      }
    } else {
      $this->DiffCart->setCart(null);
    }

    firecake($this->DiffCart->getCart(), 'DiffCart');
  }
}
