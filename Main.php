<?php

require_once("Car.php");
require_once("Honda.php");
require_once("Nissan.php");
require_once("Ferrari.php");
require_once("Toyota.php");
require_once("CarProduce.php");
require_once("Calculate.php");
require_once("Race.php");

echo "<Q1>\n";
$honda1 = new Honda();
$nissan1 = new Nissan();
$ferrari1 = new Ferrari();
$cars1 = array($honda1, $nissan1, $ferrari1);
foreach ($cars1 as $car) {
    $car->outputQ1();
}
echo "\n";

echo "<Q2>\n";
$ferrari2 = new Ferrari();
$ferrari2->outputQ2();
echo "\n";

echo "<Q3>\n";
$car_produce = new CarProduce();
$car_produce->outputCarCount();
Calculate::outputQ4($car_produce);
echo "\n";

echo "<Q4>\n";
$honda4 = new Honda();
$nissan4 = new Nissan();
$ferrari4 = new Ferrari();
$cars4 = array($honda4, $nissan4, $ferrari4,);
foreach ($cars4 as $car) {
    $car->outputQ4();
}
echo "\n";

echo "<Q6>\n";
$race = new Race();
$ferrari6 = new Ferrari();
$honda6 = new Honda();
$nissan6 = new Nissan();
$toyota6 = new Toyota();
$cars6 = array($honda6, $nissan6, $ferrari6, $toyota6);
//toyotaの加速度を確認
$toyota6->outputPriceAndAcceleration();
echo "--------------\n";
//レース中の実際の加速度を確認
foreach ($cars6 as $car) {
    $car->outputActualAcceleration();
};
//レース開始
echo $race->startRace($cars6);
