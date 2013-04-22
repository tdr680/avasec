<?php
App::uses('AppController', 'Controller');
/**
 * Acodes Controller
 *
 * @property Acode $Acode
 */
class AcodesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Acode->recursive = 0;
		$this->set('acodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Acode->exists($id)) {
			throw new NotFoundException(__('Invalid acode'));
		}
		$options = array('conditions' => array('Acode.' . $this->Acode->primaryKey => $id));
		$this->set('acode', $this->Acode->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Acode->create();
			if ($this->Acode->save($this->request->data)) {
				$this->Session->setFlash(__('The acode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acode could not be saved. Please, try again.'));
			}
		}
		$entities = $this->Acode->Entity->find('list');
		$roles = $this->Acode->Role->find('list');
		$this->set(compact('entities', 'roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Acode->exists($id)) {
			throw new NotFoundException(__('Invalid acode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Acode->save($this->request->data)) {
				$this->Session->setFlash(__('The acode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acode could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Acode.' . $this->Acode->primaryKey => $id));
			$this->request->data = $this->Acode->find('first', $options);
		}
		$entities = $this->Acode->Entity->find('list');
		$roles = $this->Acode->Role->find('list');
		$this->set(compact('entities', 'roles'));
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
		$this->Acode->id = $id;
		if (!$this->Acode->exists()) {
			throw new NotFoundException(__('Invalid acode'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Acode->delete()) {
			$this->Session->setFlash(__('Acode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Acode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
