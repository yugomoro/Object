<?php

  require_once("Car.php");
  
  class Nissan extends Car {
	private $poor_acceleration;
	  
	public function __construct() {
		$this->company = "Nissan";
		$this->price = mt_rand(100, 300);
		$this->capacity = 5;
		$this->acceleration = 8;
		$this->passenger = mt_rand(1, $this->capacity);
		$this->poor_acceleration = $this->acceleration * 0.6;
		$this->actual_acceleration = $this->getActualAcceleration();
	}
}

?>
