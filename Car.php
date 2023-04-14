<?php

class Car {
	protected $company = ""; // 企業名
	protected $price = ""; // 価格
	protected $capacity = ""; // 定員数
	protected $acceleration = ""; // 加速度

	public function accelerate() {}

	public function brake() {}

	public function getCompany() {
		return $this->company;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getCapacity() {
		return $this->capacity;
	}

	public function getAcceleration() {
		return $this->acceleration;
	}
}

?>
