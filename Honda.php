<?php
require_once("Car.php");

class Honda extends Car
{
  public function __construct()
  {
    parent::__construct("Honda", 400, 600, 8, 5, 120);
  }
}

?>
