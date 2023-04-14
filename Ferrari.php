<?php
  require_once("Car.php");

class Ferrari extends Car {
	public function __construct() {
		$this->company = "Ferrari";
		$this->price = mt_rand(2000, 5000);
		$this->capacity = 2;
		$this->acceleration = 13;
  }
}

?>
