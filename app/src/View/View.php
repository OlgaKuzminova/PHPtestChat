<?php

namespace App\View;

class View {
    private $viewName;
    private $data; 

    public function __construct($viewName) {
        $this->viewName = $viewName;
    }

    public function setData($data) {
        $this->data = $data; 
    }

    public function render() {
        include __DIR__ . '/../../src/View/' . $this->viewName . '.php';
    }
}
