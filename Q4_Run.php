<?php
require_once("Honda.php");
require_once("Nissan.php");
require_once("Ferrari.php");

$honda4 = new Honda();
$nissan4 = new Nissan();
$ferrari4 = new Ferrari();

$cars4 = array($honda4, $nissan4, $ferrari4);
  foreach ($cars4 as $value) {
    $company = $value->getCompany();
    $passenger = $value->getPassenger();
    $actual_acceleration = $value->getActualAcceleration();
    echo $company . "の乗員数は" . $passenger . "人です。よって実際の加速度は" . $actual_acceleration . "m/s²です。\n";
  }
echo "※Nissanは生産時の欠陥により、加速度の60%が上限となっています。"

?>
