<?php

require_once("Car.php");

class Toyota extends Car
{
  public function __construct()
  {
    parent::__construct("Toyota", 500, 1000, 5, $this->price / 100, 150);
  }
}

?>
