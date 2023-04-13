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

class Calculate {
	private $honda_count = 0;
	private $nissan_count = 0;
	private $ferrari_count = 0;
	private $total_count = 0;
	private $total_price = 0;
	private $average_price = 0;

	public function __construct() {
		 for ($i = 0; $i < mt_rand(10, 20); $i++) {
            $car = $this->generateRandomCar();
            switch ($car->getName()) {
                case "Honda":
                    $this->honda_count++;
                    break;
                case "Nissan":
                    $this->nissan_count++;
                    break;
                case "Ferrari":
                    $this->ferrari_count++;
                    break;
            }
            $this->total_count++;
            $this->total_price += $car->getPrice();
        }
        $this->average_price = $this->total_price / $this->total_count;
    }

private function generateRandomCar() {
	$rand = mt_rand(1,3);
	switch ($rand) {
		case 1:
			return new Honda();
		case 2:
			return new Nissan();
		case 3:
			return new Ferrari();
	}
}

public function getHondaCount() {
	return $this->honda_count;
}

public function getNissanCount() {
	return $this->nissan_count;
}

public function getFerrariCount() {
	return $this->ferrari_count;
}

public function getTotalCount() {
	return $this->total_count;
}

public function getTotalPrice() {
    return $this->total_price;
}

public function getAveragePrice() {
	return $this->average_price;
}
}

$calculator = new Calculate();
echo "Honda: " . $calculator->getHondaCount() . "台\n";
echo "Nissan: " . $calculator->getNissanCount() . "台\n";
echo "Ferrari: " . $calculator->getFerrariCount() . "台\n";
echo "合計台数: " . $calculator->getTotalCount() . "台\n";
echo "合計金額: " . $calculator->getTotalPrice() . "万円です。\n";
echo "平均金額: 約" . round($calculator->getAveragePrice(), 1) . "万円です。";

?>
