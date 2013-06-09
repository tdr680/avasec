<?php
App::uses('AppController', 'Controller');

App::import('Lib', 'DebugKit.FireCake');

/**
 * Entities Controller
 *
 * @property Entity $Entity
 */
class EntitiesController extends AppController {

  public $components = array('Search.Prg');
  public $presetVars = true;

  public $uses = array('Entity', 'EntityTask', 'EntityMtyp', 'EntityWfc', 'EntityCtx', 'EntityAppl');
  public $paginate = array();

/**
 * index method
 *
 * @return void
 */
	public function index() {
      $this->Entity->recursive = 0;

      $this->Prg->commonProcess();
      $this->paginate['conditions'] = $this->Entity->parseCriteria($this->passedArgs);
      
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
      /* if (!isset($this->request->pass[1])) { */
      /*   throw new NotFoundException(__('Missing entity type')); */
      /* } */

      /* $e_type = strtolower($this->request->pass[1]); */
      /* // if not set then error */

      /* if (!$this->Entity->exists($id)) { */
      /*   throw new NotFoundException(__('Invalid entity')); */
      /* } */

      /* $options = array('conditions' => array('AND' => array( */
      /*                                                       array('Entity.'.$this->Entity->primaryKey => $id), */
      /*                                                       array('Entity.type'                       => $e_type)))); */
      /* $e = $this->Entity->find('first', $options); */

      $e = $this->Entity->findById($id);
      $e_type = strtolower($e['Entity']['type']);

      $e_name = 'Entity'.ucfirst($e_type);
      if (!isset($this->$e_name)) {
        throw new NotFoundException(__('Wrong entity type'));
      }
      $entity = $this->$e_name->findById($id);
      firecake($entity);
      $this->set('entity', $entity);
      $this->render('view_'.$e_type);
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


/**
 * index of applications
 *
 * @return void
 */
	public function appl() {
      /* $this->set('entities', $this->Entity->find('all', array('conditions'=>array('type'=>'APPL')))); */
      /* $this->paginate = array('conditions' => array('Entity.type LIKE' => 'APPL')); */
      
      $this->EntityAppl->recursive = 0;      
      $this->set('entities', $this->paginate('EntityAppl'));
	}

/**
 * index of meta types
 *
 * @return void
 */
	public function mtyp() {
      firecake($this->request);
      //debug($this->Paginator);

      $grp = null;
      if ($this->request->pass) {
        $grp = $this->request->pass[0];
      }
      if ($grp) {
        $this->paginate = array('conditions' => array('UPPER(EntityMtyp.grp) =' => strtoupper($grp)));
        //$this->paginate->numbers(array('first' => 2, 'last' => 2));
        //debug($this->paginate);
        //debug($this->paginate('EntityMtyp'));
      }

      /* $this->Entity->recursive = 0; */
      /* $this->paginate = array('conditions' => array('Entity.type LIKE' => 'MTYP')); */
      /* $this->set('entities', $this->paginate()); */
      
      $this->EntityMtyp->recursive = 0;
      $this->set('entities', $this->paginate('EntityMtyp'));
	}
    
/**
 * index of tasks
 *
 * @return void
 */
	public function task() {
      $named = $this->request->named;
      $type = null;
      if (array_key_exists('type', $named)) {
        $type = $named['type'];
        $this->paginate = array('conditions' => array('UPPER(EntityTask.type) LIKE' => strtoupper($type).'%'));
      }

      $this->EntityTask->recursive = 0;
      $this->set('entities', $this->paginate('EntityTask'));
	}

/**
 * index of workflows
 *
 * @return void
 */
	public function wfc() {
      $named = $this->request->named;
      firecake($named);
      $mt = null;
      if (array_key_exists('mt', $named)) {
        $mt = $named['mt'];
        $this->paginate = array('conditions' => array('meta_typ_id =' => $mt));
      }

      $this->EntityWfc->recursive = 0;
      //firecake($this->paginate('EntityWfc'));
      $this->set('entities', $this->paginate('EntityWfc'));
	}

/**
 * index of ctx actions
 *
 * @return void
 */
	public function ctx() {
      $this->EntityCtx->recursive = 0;

      $this->Prg->commonProcess();
      $this->paginate['conditions'] = $this->EntityCtx->parseCriteria($this->passedArgs);

      $this->set('entities', $this->paginate('EntityCtx'));
	}
}
