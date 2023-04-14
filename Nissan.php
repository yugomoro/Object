<?php

  require_once("Car.php");
  
  class Nissan extends Car {
	public function __construct() {
		$this->company = "Nissan";
		$this->price = mt_rand(100, 300);
		$this->capacity = 5;
		$this->acceleration = 8;
	}
}

?>
