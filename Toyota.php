<?php
require_once("Car.php");

class Toyota extends Car {
    parent::public function __construct() {
        $this->company = "Toyota";
        $this->price = mt_rand(500, 1000);
        $this->capacity = 5;
        $this->acceleration = $this->price / 100;
        $this->passenger = mt_rand(1, $this->capacity);
        $this->actual_acceleration = $this->getActualAcceleration();
    }
}
?>
