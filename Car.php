<?php

class Car
{
    public string $company; //企業名
    public int $price; //価格
    public int $capacity; //定員
    public float $acceleration; //加速度(m/s^2)
    public int $passenger; //乗員数
    public float $actual_acceleration; //乗員数による実際の加速度(m/s^2)
    public int $max_speed; // 最高速度(km/h)

    public function __construct($company, $min, $max, $capacity, $acceleration, $maxSpeed)
    {
        $this->company = $company;
        $this->price = mt_rand($min, $max);
        $this->capacity = $capacity;
        $this->acceleration = $acceleration;
        $this->passenger = mt_rand(1, $capacity);
        $this->actual_acceleration = $this->getActualAcceleration();
        $this->max_speed = $maxSpeed;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function getAcceleration()
    {
        return $this->acceleration;
    }

    public function getPassenger()
    {
        return $this->passenger;
    }

    public function getActualAcceleration()
    {
        $actual_acceleration = $this->acceleration * (1 - 0.05 * $this->passenger);
        return $actual_acceleration;
    }
}

?>
