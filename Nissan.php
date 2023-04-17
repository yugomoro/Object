<?php

require_once("Car.php");

class Nissan extends Car
{
  public function __construct()
  {
    parent::__construct("Nissan", 100, 300, 5, 8, 120);
  }

  public function getActualAcceleration()
  {
    $actual_acceleration = parent::getActualAcceleration() * 0.6;
    $text = "※Nissanは生産時の欠陥により、加速値の60％の性能しか出ません。";
    return "Nissan乗車人数は" . $this->getPassenger() . "人のため、実際の加速性能は" . number_format($actual_acceleration, 2) . "m/s²です。" . $text;
  }
}

?>
