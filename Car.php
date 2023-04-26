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
    protected $deceleration = 3; //ブレーキ性能(m/s²)
    protected $converted_max_speed; //変換した最高速度(m/s)

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
        return $this->actual_acceleration = round($this->acceleration * (1 - 0.05 * $this->passenger), 2); //乗員数が1人増えるごとに、加速度が5%低下
    }

    public function getConvertedMaxSpeed()
    {
        return $this->converted_max_speed = $this->max_speed / 3.6;
    }

    public function getDeceleration()
    {
        return $this->deceleration;
    }

    // 距離を与えた時間で走行した場合の最終速度を計算する
    public function calcFinalSpeed($race_distance,$time)
    {
        // 現在の速度を初期値とする
        $speed = 0;

        // 加速する時間を計算する
        $accelerationTime = $this->converted_max_speed / $this->actual_acceleration;

        // 最高速度に達するまで加速する
        if ($accelerationTime < $time) {
            $speed = $this->max_speed;
            $time -= $accelerationTime;
        } else {
            $speed = $this->actual_acceleration * $time;
            return $speed;
        }

        // 減速する時間を計算する
        $decelerationTime = $this->max_speed / $this->deceleration;

        // 最高速度から停止するまで減速する
        if ($decelerationTime < $time) {
            $speed = 0;
        } else {
            $speed = max(0, $speed - $this->deceleration * ($time - $accelerationTime));
        }

        return $speed;
    }
}
