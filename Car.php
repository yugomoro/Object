<?php

class Car {
	protected $company = ""; // 企業名
	protected $price = ""; // 価格
	protected $capacity = ""; // 定員数
	protected $acceleration = ""; // 加速度
	protected $passenger = ""; //乗員数
	protected $actual_acceleration = ""; //実際の加速度

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
	
	public function getPassenger() {
		return $this->passenger;
	}
	
	public function getActualAcceleration() {
		if ($this instanceof Nissan) {
			$poor_acceleration = $this->acceleration * 0.6;
			$actual_acceleration = $poor_acceleration * (1 - 0.05 * $this->passenger);
		} else {
			$actual_acceleration = $this->acceleration * (1 - 0.05 * $this->passenger);
		}
		return $actual_acceleration;
	}
}

?>
