<?php

class CarProduce
{
    private $cars = [Honda::class, Nissan::class, Ferrari::class];
    protected $honda_count = 0;
    protected $nissan_count = 0;
    protected $ferrari_count = 0;
    protected $total_count = 0;
    protected $cars_generated = [];

    public function generateRandomCar()
    {
        $rand = mt_rand(0, count($this->cars) - 1);
        $class = $this->cars[$rand];
        return new $class();
    }

    public function countCars()
    {
        for ($i = 0; $i < mt_rand(10, 20); $i++) {
            $car = $this->generateRandomCar();
            if ($car instanceof Honda) {
                $this->honda_count++;
            } elseif ($car instanceof Nissan) {
                $this->nissan_count++;
            } elseif ($car instanceof Ferrari) {
                $this->ferrari_count++;
            }
            $this->total_count++;
            $this->cars_generated[] = $car;
        }
    }

    public function outputCarCount()
    {
        $this->countCars();
        echo "Honda車の生成台数: {$this->honda_count}台\n";
        echo "Nissan車の生成台数: {$this->nissan_count}台\n";
        echo "Ferrari車の生成台数: {$this->ferrari_count}台\n";
        echo "合計台数:{$this->total_count}台\n";
    }

    public function getCarsGenerated()
    {
        return $this->cars_generated;
    }

    public function getTotalCount()
    {
        return $this->total_count;
    }
}
