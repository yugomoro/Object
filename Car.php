<?php

class Car
{
    protected $company; //企業名
    protected $price; //価格(任意の範囲でランダム生成)
    protected $capacity; //定員
    protected $acceleration; //加速度(m/s²)
    protected $passenger; //乗車人数
    protected $actual_acceleration; //乗員数による実際の加速性能(m/s²)
    protected $max_speed; //最高速度(km/h)
    public $brake_counts; //ブレーキ回数


    public function __construct($company, $min, $max, $capacity, $acceleration, $max_speed)
    {
        $this->company = $company;
        $this->price = mt_rand($min, $max);
        $this->capacity = $capacity;
        $this->acceleration = $acceleration;
        $this->passenger = mt_rand(1, $capacity);
        $this->actual_acceleration = $this->getActualAcceleration();
        $this->max_speed = $max_speed;
        $this->brake_counts = mt_rand(10, 20);
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
        return $this->actual_acceleration = round($this->acceleration * (1 - 0.05 * $this->passenger), 2); //乗員数が1人増えるごとに、加速度が5%低下
    }

    public function getMaxSpeed()
    {
        return $this->max_speed;
    }

    public function getBrakeCounts()
    {
        return $this->brake_counts;
    }

    public function timeToMaxSpeed()
    {
        return ($this->max_speed * 1000 / 60 / 60) / $this->actual_acceleration;
    }

    public function timeToStop()
    {
        return ($this->max_speed * 1000 / 60 / 60) / 6;
    }
    //減速度=6m/s*2

    public function distanceToMaxSpeed()
    {
        return $this->actual_acceleration / 2 * $this->timeToMaxSpeed() * $this->timeToMaxSpeed();
    }

    public function distanceTraveledAtMaxSpeed($max_speed_time)
    {
        return ($this->max_speed * 1000 / 60 / 60) * $max_speed_time;
    }

    public function distanceToStop()
    {
        return ($this->max_speed * 1000 / 60 / 60) * $this->timeToStop() - (0.5 * 6 * ($this->timeToStop() * $this->timeToStop()));
    }
    //減速度=6m/s*2

    public function outputQ1()
    {
        echo "{$this->getCompany()}の価格は{$this->getPrice()}万円です。定員は{$this->getCapacity()}人で、加速度は{$this->getAcceleration()}m/s²です。\n";
    }

    public function outputQ4()
    {
        echo "{$this->getCompany()}の定員は{$this->getCapacity()}人です。今回の乗車人数は{$this->getPassenger()}人のため、実際の加速性能は{$this->getActualAcceleration()}m/s²です。\n";
    }

    public function outputActualAcceleration()
    {
        echo "{$this->getCompany()}の乗車人数は{$this->getPassenger()}人のため、実際の加速性能は{$this->getActualAcceleration()}m/s²です。\n";
    }
}
