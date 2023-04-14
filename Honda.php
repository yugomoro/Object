<?php
  require_once("Car.php");

class Honda extends Car {
	public function __construct() {
		$this->company = "Honda";
		$this->price = mt_rand(400, 600);
		$this->capacity = 8;
		$this->acceleration = 5;
	}
}

?>