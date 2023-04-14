<?php
  require_once("Honda.php");
  require_once("Nissan.php");
  require_once("Ferrari.php");

$honda = new Honda();
$nissan = new Nissan();
$ferrari = new Ferrari();

$cars1 = array($honda1, $nissan1, $ferrari1);
  foreach ($cars1 as $value) {
    $company = $value->getCompany();
    $price = $value->getPrice();
    $capacity = $value->getCapacity();
    $acceleration = $value->getAcceleration();
    echo $company . "の価格は" . $price . "万円です。定員は" . $capacity . "人で、加速度は" . $acceleration . "m/s²です。\n";
  }

?>
