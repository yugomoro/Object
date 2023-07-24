<?php

require_once("Car.php");

class Nissan extends Car
{
    public function __construct()
    {
        parent::__construct("Nissan", 100, 300, 5, 6, 120);
    }

    public function getActualAcceleration()
    {
        $actual_acceleration = parent::getActualAcceleration() * 0.6;
        $text = "（※生産時の欠陥により、加速値の60%が上限）";
        return number_format($actual_acceleration, 2) . $text;
    }
}
