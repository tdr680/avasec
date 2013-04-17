<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('AppController', 'Controller');

class UsersController extends AppController {

  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');
  public $uses = array('User', 'UserMod', 'UserVer', 'Team', 'UserTeam', 'Role', 'UserRole');
  
  public function index() {
    $this->set('users', $this->User->find('all'));
  }
  
  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById($id);
    if (!$user) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->set('user', $user);

    $user_ver = $this->UserVer->find('all', array('conditions'=>array('user_id'=>$id),
                                                  'order'=>array('UserVer.id desc')));
    $this->set('user_ver', $user_ver);
  }  

  public function ver($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid user version'));
    }

    $user_ver = $this->UserVer->findById($id);
    if (!$user_ver) {
      throw new NotFoundException(__('Invalid user version'));
    }
    $this->set('uv', $user_ver);
  }

  public function rever($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid user version'));
    }

    /* if (!$this->request->is('post')) { */
    /*   throw new MethodNotAllowedException(); */
    /* } */

    if ($this->UserVer->delete($id)) {
        $this->Session->setFlash('The user version: ' . $id . ' has been deleted.');
        $this->redirect(array('action' => 'index'));
    }
  }

  public function add() {
    $data = $this->request->data;
    // pr($data);
    // debug($this->request->data);
    
    $ds = $this->UserMod->getDataSource();
    firecake($ds);

    firecake($this->Auth->user('id'));

    if ($this->request->is('post')) {
      // -- begin trans
      $ds->begin();
      $this->UserMod->create();
      if ($this->UserMod->save(array('login'=>$data['User']['login']))) {
        // $this->redirect(array('action' => 'index'));
        // firecake($this->UserMod->id);
        $this->UserVer->create();
        if ($this->UserVer->save(array('user_id'=>$this->UserMod->id, 'name'=>$data['User']['name']))) {
          $this->Session->setFlash('User has been saved.');
          // -- commit trans
          $ds->commit();
        } else {
          $this->Session->setFlash('Unable to add the user version.');
          // -- rollback trans
          $ds->rollback();
        }            
      } else {
        $this->Session->setFlash('Unable to add the user.');
        // -- rollback trans
        $ds->rollback();
      }
    }
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById($id);
    if (!$user) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->set('user', $user);
    $this->set('teams', $this->Team->find('list'));
    $this->set('roles', $this->Role->find('list'));

    if ($this->request->is('post')) {
      $ds = $this->UserMod->getDataSource();

      $data = $this->request->data;
      firecake($data);
      $this->UserVer->create();

      $ds->begin(); // begin trans
      if ($this->UserVer->save(array('user_id'=>$id, 'name'=>$data['User']['name']))) {
        // save user_team
        $user_ver_id = $this->UserVer->id;

        $teams = $data['Team']['Team'];
        if ($teams) {
          foreach ($teams as $t) {
            $this->UserTeam->create();
            $this->UserTeam->save(array('team_id'=>$t, 'user_ver_id'=>$user_ver_id));
          }
        }

        $roles = $data['Role']['Role'];
        if ($roles) {
          foreach ($roles as $r) {
            $this->UserRole->create();
            $this->UserRole->save(array('role_id'=>$r, 'user_ver_id'=>$user_ver_id));
          }
        }

        $this->Session->setFlash('User has been saved.');
        $ds->commit();
      } else {
        $this->Session->setFlash('Unable to add the user version.');
        $ds->rollback();
      }

    }
  }

  public function login() {
    if ($this->request->is('post')) {
      $data = $this->request->data;
      firecake(AuthComponent::password($data['User']['password']));

      if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
      } else {
        $this->Session->setFlash(__('Invalid username or password, try again'));
      }
    }
  }

  public function logout() {
    $this->redirect($this->Auth->logout());
  }
}