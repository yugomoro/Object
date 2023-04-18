
<?php
class Car
{
    public $company; //企業名
    public $price; //価格
    public $capacity; //定員
    public $acceleration; //加速度(m/s^2)
    public $passenger; //乗員数
    public $actual_acceleration; //乗員数による実際の加速度(m/s^2)
    public $max_speed; //最高速度(km/h)
    public int $brakeTimes;
    public float $distanceToMax;
    public float $timeToMax;
    public float $distanceToStop;
    public float $timeToStop;
    public float $totalTime;
    public string $convertedTime;

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
        echo $this->company."の定員数は".$this->capacity."人、乗員数は".$this->passenger."人です。\n";
    }

    public function getActualAcceleration()
    {
        return $this->acceleration * (1 - 0.05 * $this->passenger);
    }

    public function getMaxSpeed()
    {
        echo $this->company."の最高速度は".$this->max_speed."km/hです。\n";
    }
    
    public function defineBrakeTimes()
    {
        $this->brakeTimes = mt_rand(1, 20);
        echo $this->company."のブレーキ回数は".$this->brakeTimes."回です。\n";
    }
    
    public function pressAccelerator()
    {
        //最高速になるまでの距離を計算(m)
        $this->distanceToMax = ($this->max_speed * 1000 / 60 / 60) * ($this->max_speed * 1000 / 60 / 60) / $this->acceleration;
        //最高速になるまでの時間を計算（sec.）
        $this->timeToMax = 2 * $this->distanceToMax / ($this->max_speed * 1000 / 60 / 60);
    }

    public function pressBrake()
    {
        //停止するまでの距離を計算
        $this->distanceToStop = ($this->max_speed * 1000 / 60 / 60) * ($this->max_speed * 1000 / 60 / 60) / (2 * 9.8 * 0.7);
        //停止するまでの時間を計算
        $this->timeToStop = ($this->max_speed * 1000 / 60 / 60) / (9.8 * 0.7);
    }
}
