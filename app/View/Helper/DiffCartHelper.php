<?php

App::uses('AppHelper', 'View/Helper');

class DiffCartHelper extends AppHelper {

  public function __construct(View $view, $settings = array()) {
    parent::__construct($view, $settings);
  }

  public function show() {
    return "<span class='history'>D I F F   C A R T</span>";
  }
}