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
}
