<?php

require_once("Car.php");
require_once("Honda.php");
require_once("Nissan.php");
require_once("Ferrari.php");
require_once("Calculate.php");
require_once("Race.php");


echo "<Q1>\n";
$honda1 = new Honda();
$nissan1 = new Nissan();
$ferrari1 = new Ferrari();

$cars1 = array($honda1, $nissan1, $ferrari1);
foreach ($cars1 as $value) {
  $company = $value->getCompany();
  $price = $value->getPrice();
  $capacity = $value->getCapacity();
  $acceleration = $value->getAcceleration();
  echo $company . "の価格は" . $price . "万円です。定員は" . $capacity . "人で、加速度は" . $acceleration . "m/s²です。\n";
}


echo "<Q2>\n";
// 通常時の車高と加速度
$ferrari2 = new Ferrari();
$ferrari2->showStatus();

// リフトアップ後の車高と加速度
$ferrari2->Liftup();
$ferrari2->showStatus();

// もう一度リフトアップ
$ferrari2->Liftup();

// リフトダウン後の車高と加速度
$ferrari2->Liftdown();
$ferrari2->showStatus();

// もう一度リフトダウン
$ferrari2->Liftdown();


echo "<Q3>\n";
$calculate = new Calculate();

echo "Hondaの車の数: " . $calculate->getHondaCount() . "台\n";
echo "Nissanの車の数: " . $calculate->getNissanCount() . "台\n";
echo "Ferrariの車の数: " . $calculate->getFerrariCount() . "台\n";
echo "車の総数: " . $calculate->getTotalCount() . "台\n";
echo "合計金額: " . number_format($calculate->getTotalPrice()) . "円\n";
echo "平均金額: " . number_format($calculate->getAveragePrice()) . "円\n";


echo "<Q4>\n";
$ferrari4 = new Ferrari();
$honda4 = new Honda();
$nissan4 = new Nissan();
$toyota4 = new Toyota();

$cars4 = array($honda4, $nissan4, $ferrari4, $toyota4);
foreach ($cars1 as $value) {
  $company = $value->getCompany();
  $passnger = $value->getPassenger();
  $actual_acceleration = $value->getActualAcceleration();
  echo $company . "乗車人数は" . $passenger . "人のため、実際の加速性能は" . $actual_acceleration . "m/s²です。\n";
}


echo "<Q6>\n";
$race = new Race();
$race->start();

?>
