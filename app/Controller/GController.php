<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('AppController', 'Controller');

class GController extends AppController {

  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');
  public $uses = array('Team', 'Entity', 'Acode', 'Role');

  public function index() {

    $entity = $this->Entity->find('all');
    firecake($entity);

    $acode = $this->Acode->find('all');
    firecake($acode);

    $role = $this->Role->find('all');
    firecake($role);


    $g_attr = array(/* 'rankdir'=>'LR' */);

    $node_attr = array('fontname'=>'Verdana', 
                       'fontsize'=>'10', 
                       'fixedsize'=>'true', 
                       'width'=>'0.6', 
                       'shape'=>'circle', 
                       'URL'=>'http://localhost/');
    $edge_attr = array('URL'=>'http://localhost/',
                       'arrowsize'=>'0.4');

    $g = new Image_GraphViz(true, $g_attr);

    $g->addCluster('entity', null, array('rank'=>'same', 'style'=>'invis'));
    $g->addCluster('acode', null, array('rank'=>'same', 'style'=>'invis'));
    $g->addCluster('role', null, array('rank'=>'same', 'style'=>'invis'));

    foreach ($role as $r) {
      $g->addNode($r['Role']['name'], $node_attr, 'role');
    }

    foreach ($acode as $a) {
      $g->addNode($a['Acode']['id'], $node_attr, 'acode');
    }

    foreach ($entity as $e) {
      $g->addNode($e['Entity']['name'], $node_attr, 'entity');
    }

    foreach ($role as $r) {
      foreach ($r['Acode'] as $a) {
        $g->addEdge(array($r['Role']['name'] => $a['id']), $edge_attr);
      }
    }

    foreach ($acode as $a) {
      foreach ($a['Entity'] as $e) {
        $g->addEdge(array($a['Acode']['id'] => $e['name']), $edge_attr);
      }
    }

    firecake($g);    
    $g->image();
    exit;
  }
}
