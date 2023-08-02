<?php

require_once("Car.php");

class Toyota extends Car
{
    public function __construct()
    {
        $min = 500;
        $max = 900;
        $price = mt_rand($min, $max);
        $acceleration = $price / 100;
        parent::__construct("Toyota", $min, $max, 5, $acceleration, 150);
    }

    public function outputPriceAndAcceleration()
    {
        $company = parent::getCompany();
        $price = parent::getPrice();
        $acceleration = parent::getAcceleration();
        echo "今回の{$company}の価格は{$price}万円なので、加速度は{$acceleration}m/s²です。\n";
    }
}
