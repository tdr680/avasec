<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('AppController', 'Controller');

class TeamsController extends AppController {

  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');
  public $uses = array('Team');
  
  public function index() {
    $this->set('teams', $this->Team->find('all'));
  }

  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid team'));
    }

    $team = $this->Team->findById($id);
    if (!$team) {
      throw new NotFoundException(__('Invalid team'));
    }
    $this->set('team', $team);
  }  

  public function add() {
    $data = $this->request->data;
    firecake($data);
    // pr($data);
    // debug($this->request->data);

    if ($this->request->is('post')) {
      $this->Team->create();
      if ($this->Team->save($data)) {
        $this->Session->setFlash('Team has been saved.');
      } else {
        $this->Session->setFlash('Unable to add the team.');
      }
    }
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid team'));
    }

    $team = $this->Team->findById($id);

    if (!$team) {
      throw new NotFoundException(__('Invalid team'));
    }

    firecake($team);

    if ($this->request->is('post') || $this->request->is('put')) {
      firecake($this->request);

      $this->Team->id = $id;

      if ($this->Team->save($this->request->data)) {
        $this->Session->setFlash('Team has been updated.');
        $this->redirect(array('action'=>'index'));
      } else {
        $this->Session->setFlash('Unable to update team.');
      }
    }
    
    if (!$this->request->data) {
      $this->request->data = $team;
    }
  }
}