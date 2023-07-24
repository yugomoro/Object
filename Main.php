<?php

require_once("Car.php");
require_once("Honda.php");
require_once("Nissan.php");
require_once("Ferrari.php");
require_once("Toyota.php");
require_once("Calculate.php");
require_once("Race.php");


echo "<Q1>\n";
$honda1 = new Honda();
$nissan1 = new Nissan();
$ferrari1 = new Ferrari();
$cars1 = array($honda1, $nissan1, $ferrari1);

foreach ($cars1 as $car) {
    $company = $car->getCompany();
    $price = $car->getPrice();
    $capacity = $car->getCapacity();
    $acceleration = $car->getAcceleration();
    echo "{$company}の価格は{$price}万円です。定員は{$capacity}人で、加速度は{$acceleration}m/s²です。\n";
}
echo "\n";


echo "<Q2>\n";
// 通常時の車高と加速度
$ferrari2 = new Ferrari();
$ferrari2->showStatus();
// リフトアップ後の車高と加速度
$ferrari2->upLift();
$ferrari2->showStatus();
// もう一度リフトアップ
$ferrari2->upLift();
// リフトダウン後の車高と加速度
$ferrari2->downLift();
$ferrari2->showStatus();
// もう一度リフトダウン
$ferrari2->downLift();
echo "\n";


echo "<Q3>\n";
$calculate = new Calculate();
$total_price = number_format($calculate->getTotalPrice());
$average_price = number_format($calculate->getAveragePrice());

echo "Honda車の生成台数: {$calculate->getHondaCount()}台\n";
echo "Nissan車の生成台数: {$calculate->getNissanCount()}台\n";
echo "Ferrari車の生成台数: {$calculate->getFerrariCount()}台\n";
echo "車の合計台数: {$calculate->getTotalCount()}台\n";
echo "合計金額: {$total_price}万円\n";
echo "平均金額: {$average_price}万円\n";
echo "\n";


echo "<Q4>\n";
$ferrari4 = new Ferrari();
$honda4 = new Honda();
$nissan4 = new Nissan();

$cars4 = array($honda4, $nissan4, $ferrari4,);
foreach ($cars4 as $car) {
    $company = $car->getCompany();
    $capacity = $car->getCapacity();
    $passenger = $car->getPassenger();
    $actual_acceleration = $car->getActualAcceleration();
    echo "{$company}の定員は{$capacity}です。\n" .
        "今回の乗車人数は{$passenger}人のため、実際の加速性能は{$actual_acceleration}m/s²です。\n";
}
echo "\n";


echo "<Q6>\n";
$race = new Race();
$ferrari6 = new Ferrari();
$honda6 = new Honda();
$nissan6 = new Nissan();
$toyota6 = new Toyota();
$cars6 = array($honda6, $nissan6, $ferrari6, $toyota6);

echo "今回の{$toyota6->getCompany()}の価格は{$toyota6->getPrice()}万円なので、加速度は{$toyota6->getAcceleration()}m/s²です。\n";
echo "\n";

foreach ($cars6 as $car) {
    $company = $car->getCompany();
    $passenger = $car->getPassenger();
    $actual_acceleration = $car->getActualAcceleration();
    echo "{$company}の乗車人数は{$passenger}人のため、実際の加速性能は{$actual_acceleration}m/s²です。\n";
};
echo "\n";

echo $race->startRace($cars6);
