<?php
App::import('Lib', 'DebugKit.FireCake');

App::uses('AppController', 'Controller');

class GController extends AppController {

  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');
  public $uses = array('Team', 'Entity', 'Acode', 'Role', 'User');

  public function index() {

    $entity = $this->Entity->find('all');
    firecake($entity);

    $acode = $this->Acode->find('all');
    firecake($acode);

    $role = $this->Role->find('all');
    firecake($role);

    $user = $this->User->find('all');
    firecake($user);

    $team = $this->Team->find('all');
    firecake($team);

    $g_attr = array(/* 'rankdir'=>'LR' */);

    $node_attr = array('fontname'=>'Verdana', 
                       'fontsize'=>'9', 
                       'fixedsize'=>'true', 
                       'width'=>'0.6', 
                       'shape'=>'circle', 
                       'URL'=>'http://localhost/',
                       'color'=>'gray',
                       'style'=>'filled',
                       'fillcolor'=>'white');
    $node_attr_2 = array('fontname'=>'Verdana', 
                         'fontsize'=>'9', 
                         'fixedsize'=>'true', 
                         'width'=>'0.6', 
                         'shape'=>'circle', 
                         'URL'=>'http://localhost/',
                         'color'=>'gray',
                         'style'=>'filled',
                         'fillcolor'=>'lightblue');
    $node_attr_3 = array('fontname'=>'Verdana', 
                         'fontsize'=>'9', 
                         'fixedsize'=>'true', 
                         'width'=>'0.6', 
                         'shape'=>'circle', 
                         'URL'=>'http://localhost/',
                         'color'=>'gray',
                         'style'=>'filled',
                         'fillcolor'=>'pink');
    $node_attr_4 = array('fontname'=>'Verdana', 
                         'fontsize'=>'9', 
                         'fixedsize'=>'true', 
                         'width'=>'0.6', 
                         'shape'=>'circle', 
                         'URL'=>'http://localhost/',
                         'color'=>'gray',
                         'style'=>'filled',
                         'fillcolor'=>'lightgreen');
    $edge_attr = array('URL'=>'http://localhost/',
                       'arrowsize'=>'0.4', 'color'=>'gray');
    $edge_attr_2 = array('URL'=>'http://localhost/',
                         'arrowsize'=>'0.4',
                         'style'=>'dotted', 'color'=>'gray');

    $g = new Image_GraphViz(true, $g_attr);

    $g->addCluster('team', null, array('rank'=>'same', /* 'style'=>'invis' */ 'style'=>'filled', 'color'=>'beige', 'fillcolor'=>'beige'));
    $g->addCluster('user', null, array('rank'=>'same', 'style'=>'filled', 'color'=>'beige', 'fillcolor'=>'beige'));
    $g->addCluster('entity', null, array('rank'=>'same', 'style'=>'filled', 'color'=>'beige', 'fillcolor'=>'beige'));
    $g->addCluster('acode', null, array('rank'=>'same', 'style'=>'filled', 'color'=>'beige', 'fillcolor'=>'beige'));
    $g->addCluster('role', null, array('rank'=>'same', 'style'=>'filled', 'color'=>'beige', 'fillcolor'=>'beige'));

    foreach ($user as $u) {
      $g->addNode($u['User']['login'], $node_attr, 'user');
      foreach ($u['Role'] as $r) {
        $g->addEdge(array($u['User']['login'] => $r['name']), $edge_attr);
      }      
      foreach ($u['Acode'] as $a) {
        $g->addEdge(array($u['User']['login'] => $a['id']), $edge_attr_2);
      }      
    }

    foreach ($team as $t) {
      $g->addNode($t['Team']['name'], $node_attr, 'team');
      foreach ($t['Member'] as $m) {
        $g->addEdge(array($t['Team']['name'] => $m['login']), $edge_attr);
      }
    }

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

    /*
    $g->addNode('role_3', $node_attr_2, 'role');
    $g->addNode('role_2', $node_attr_3, 'role');
    $g->addNode('tuco', $node_attr_3, 'role');
    $g->addNode('jess', $node_attr_3, 'role');
    $g->addNode('role_4', $node_attr_4, 'role');
    $g->addNode('1001', $node_attr_4, 'role');
    $g->addNode('1002', $node_attr_4, 'role');
    $g->addNode('1003', $node_attr_4, 'role');
    $g->addNode('entity 2', $node_attr_4, 'role');
    $g->addNode('entity 3', $node_attr_4, 'role');
    $g->addNode('entity 5', $node_attr_4, 'role');
    $g->addNode('entity 6', $node_attr_4, 'role');
    */

    /*
    $g->addEdge(array('role_1' => 'role_4'), $edge_attr);
    $g->addEdge(array('role_3' => 'role_4'), $edge_attr);
    $g->addEdge(array('role_2' => 'role_3'), $edge_attr);
    */

    firecake($g);    
    $g->image();
    exit;
  }
}
