<?php
  require_once("honda.php");
  require_once("nissan.php");
  require_once("ferrari.php");

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

?>
