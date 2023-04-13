<?php

class Car {
	protected $company = ""; // 企業名
	protected $price = ""; // 価格
	protected $capacity = ""; // 定員数
	protected $acceleration = ""; // 加速度

	public function accelerate() {}

	public function brake() {}

	public function getName() {
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

class Honda extends Car {
	public function __construct() {
		$this->company = "Honda";
		$this->price = mt_rand(400, 600);
		$this->capacity = 8;
		$this->acceleration = 5;
	}
}

class Nissan extends Car {
	public function __construct() {
		$this->company = "Nissan";
		$this->price = mt_rand(100, 300);
		$this->capacity = 5;
		$this->acceleration = 8;
	}
}

class Ferrari extends Car {
	public function __construct() {
		$this->company = "Ferrari";
		$this->price = mt_rand(2000, 5000);
		$this->capacity = 2;
		$this->acceleration = 13;
	}
}

$honda = new Honda();
$nissan = new Nissan();
$ferrari = new Ferrari();

echo $honda->getName() . "の価格は" . $honda->getPrice() . "万円で定員は" . $honda->getCapacity() . "人で加速度は" . $honda->getAcceleration() . "m/s²です。\n";
echo $nissan->getName() . "の価格は" . $nissan->getPrice() . "万円で定員は" . $nissan->getCapacity() . "人で加速度は" . $nissan->getAcceleration() . "m/s²です。\n";
echo $ferrari->getName() . "の価格は" . $ferrari->getPrice() . "万円で定員は" . $ferrari->getCapacity() . "人で加速度は" . $ferrari->getAcceleration() . "m/s²です。";

?>
