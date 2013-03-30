<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('AppController', 'Controller');

class UsersController extends AppController {

  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');
  public $uses = array('User', 'UserMod', 'UserVer', 'Team', 'UserTeam');
  
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

    $user_ver = $this->UserVer->find('all', array('conditions'=>array('user_id'=>$id)));
    $this->set('user_ver', $user_ver);
  }  

  public function add() {
    $data = $this->request->data;
    // pr($data);
    // debug($this->request->data);
    
    $ds = $this->UserMod->getDataSource();
    firecake($ds);

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
        foreach ($teams as $t) {
          $this->UserTeam->create();
          $this->UserTeam->save(array('team_id'=>$t, 'user_ver_id'=>$user_ver_id));
        }
        $this->Session->setFlash('User has been saved.');
        $ds->commit();
      } else {
        $this->Session->setFlash('Unable to add the user version.');
        $ds->rollback();
      }

    }
  }
}