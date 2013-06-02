<?php

App::uses('Component', 'Controller');
App::uses('ComponentCollection', 'Controller');

class DiffCartComponent extends Component {

  private $cart;
  
  function __construct(ComponentCollection $collection, $settings = array()) {
    parent::__construct($collection, $settings);
    $this->cart = array();
  }

  public function setCart($cart) {
    if ($cart == null) {
      $this->cart = array();
    } else {
      $this->cart = $cart;
    }
  }

  public function getCart() {
    return $this->cart;
  }

  public function add($title, $url) {
    $this->cart[$title] = $url;
  }

  public function toString() {
    ksort($this->cart);
    foreach ($this->cart as $title => $url) {
      echo "$title => $url\n";
    }
  }

  public function multiply($param1, $param2) {
    return $param1 * $param2;
  }
}