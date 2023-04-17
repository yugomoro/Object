<?php

require_once("CarProduce.php");

class Calculate
{
    private $honda_count = 0;
    private $nissan_count = 0;
    private $ferrari_count = 0;
    private $total_count = 0;
    private $total_price = 0;
    private $average_price = 0;

    public function __construct()
    {
        $carProduce = new CarProduce();
        for ($i = 0; $i < mt_rand(10, 20); $i++) {
            $car = $carProduce->generateRandomCar();
            if ($car instanceof Honda) {
                $this->honda_count++;
            } elseif ($car instanceof Nissan) {
                $this->nissan_count++;
            } elseif ($car instanceof Ferrari) {
                $this->ferrari_count++;
            }
            $this->total_count++;
            $this->total_price += $car->getPrice();
        }
        $this->average_price = $this->total_price / $this->total_count;
    }

    public function getHondaCount()
    {
        return $this->honda_count;
    }

    public function getNissanCount()
    {
        return $this->nissan_count;
    }

    public function getFerrariCount()
    {
        return $this->ferrari_count;
    }

    public function getTotalCount()
    {
        return $this->total_count;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function getAveragePrice()
    {
        return $this->average_price;
    }
}

?>
