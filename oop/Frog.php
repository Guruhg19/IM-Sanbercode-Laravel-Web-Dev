<?php
require_once 'Animal.php';

class Frog extends Animal {
    public function __construct($name) {
        parent::__construct($name);
    }

    public function jump() {
        return "Hop Hop";
    }
}