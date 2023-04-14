<?php
  require_once("Car.php");

class Ferrari extends Car {
	public function __construct() {
		$this->company = "Ferrari";
		$this->price = mt_rand(2000, 5000);
		$this->capacity = 2;
		$this->acceleration = 13;
	}
	private $height = 100;
	private $liftstatus = "true";

	function showStatus() {
		echo $this->company . "通常時の車高は" . $this->height . "mmです。加速度は" . $this->acceleration . "m/s²です。\n";
	}

	function LiftUp() {
		if ($this->liftstatus == "true") {
			$this->acceleration *= 0.8;
			$this->height += 40;
			$this->liftstatus = "false";
			echo "リフトアップしました。" . $this->company . "のリフトアップ後の車高は" . $this->height . "mmです。加速度は" . $this->acceleration . "m/s²です。\n";
		} else {
			echo "これ以上リフトアップできません。\n";
		}
	}

	function LiftDown() {
		if ($this->liftstatus == "false") {
			$this->acceleration = 13;
			$this->height -= 40;
			$this->liftstatus = "true";
			echo "リフトダウンしました。" . $this->company . "のリフトダウン後の車高は" . $this->height . "mmです。加速度は" . $this->acceleration . "m/s²です。";
		} else {
			"これ以上リフトダウンできません。";
		}
	}
}

?>
