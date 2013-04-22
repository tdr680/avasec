<?php
App::uses('AppController', 'Controller');
/**
 * Entities Controller
 *
 * @property Entity $Entity
 */
class EntitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Entity->recursive = 0;
		$this->set('entities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entity->exists($id)) {
			throw new NotFoundException(__('Invalid entity'));
		}
		$options = array('conditions' => array('Entity.' . $this->Entity->primaryKey => $id));
		$this->set('entity', $this->Entity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Entity->create();
			if ($this->Entity->save($this->request->data)) {
				$this->Session->setFlash(__('The entity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity could not be saved. Please, try again.'));
			}
		}
		$acodes = $this->Entity->Acode->find('list');
		$this->set(compact('acodes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Entity->exists($id)) {
			throw new NotFoundException(__('Invalid entity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Entity->save($this->request->data)) {
				$this->Session->setFlash(__('The entity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entity.' . $this->Entity->primaryKey => $id));
			$this->request->data = $this->Entity->find('first', $options);
		}
		$acodes = $this->Entity->Acode->find('list');
		$this->set(compact('acodes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Entity->id = $id;
		if (!$this->Entity->exists()) {
			throw new NotFoundException(__('Invalid entity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entity->delete()) {
			$this->Session->setFlash(__('Entity deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Entity was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
