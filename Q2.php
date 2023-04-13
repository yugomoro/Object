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

// Ferrariのクラス
class Ferrari extends Car {
	public function __construct() {
		$this->company = "Ferrari";
		$this->price = mt_rand(2000, 5000);
		$this->capacity = 2;
		$this->acceleration = 13;
	}
	private $height = 100;
	private $liftstatus = "down";

	function ShowStatus() {
		echo $this->company . "通常時の車高は" . $this->height . "mmです。加速度は" . $this->acceleration . "m/s²です。\n";
	}

	function LiftUp() {
		if ($this->liftstatus == "down") {
			$this->acceleration *= 0.8;
			$this->height += 40;
			$this->liftstatus = "up";
			echo "リフトアップしました。" . $this->company . "のリフトアップ後の車高は" . $this->height . "mmです。加速度は" . $this->acceleration . "m/s²です。\n";
		}
	}

	function LiftDown() {
		if ($this->liftstatus == "up") {
			$this->acceleration = 13;
			$this->height -= 40;
			$this->liftstatus = "down";
			echo "リフトダウンしました。" . $this->company . "のリフトダウン後の車高は" . $this->height . "mmです。加速度は" . $this->acceleration . "m/s²です。";
		}
	}
}

$ferrari = new Ferrari();
$ferrari->ShowStatus();
$ferrari->LiftUp();
$ferrari->LiftDown();

?>
