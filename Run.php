
<?php

require_once("Car.php");
require_once("Honda.php");
require_once("Nissan.php");
require_once("Ferrari.php");
require_once("Toyota.php");
require_once("Calculate.php");


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

echo "Honda車の生成台数: " . $calculate->getHondaCount() . "台\n";
echo "Nissan車の生成台数: " . $calculate->getNissanCount() . "台\n";
echo "Ferrari車の生成台数: " . $calculate->getFerrariCount() . "台\n";
echo "車の合計台数: " . $calculate->getTotalCount() . "台\n";
echo "合計金額: " . number_format($calculate->getTotalPrice()) . "万円\n";
echo "平均金額: " . number_format($calculate->getAveragePrice()) . "万円\n";


echo "<Q4>\n";
$ferrari4 = new Ferrari();
$honda4 = new Honda();
$nissan4 = new Nissan();

$cars4 = array($honda4, $nissan4, $ferrari4,);
foreach ($cars4 as $value) {
  $company = $value->getCompany();
  $passenger = $value->getPassenger();
  $actual_acceleration = $value->getActualAcceleration();
  echo $company . "乗車人数は" . $passenger . "人のため、実際の加速性能は" . $actual_acceleration . "m/s²です。\n";
}


echo "<Q6>\n";
$ferrari6 = new Ferrari();
$honda6 = new Honda();
$nissan6 = new Nissan();
$toyota6 = new Toyota();
$toyota6->getCompany();
$toyota6->getPrice();
$toyota6->getAcceleration();
echo $toyota6->getCompany() . "は" . $toyota6->getPrice() . "万円なので、加速性能は" . $toyota6->getAcceleration() . "m/s²です。\n";

$distance = $calucurator->defineDistance();

$cars6 = array($honda6, $nissan6, $ferrari6, $toyota6);
foreach ($cars6 as $car) {
  $car->getPassenger();

  $car->getMaxSpeed();

  $car->pressAccelerator();

  $car->pressBrake();

  $car->defineBrakeTimes();

  $acceleDistance = $car->distanceToMax;
  $acceleTime = $car->timeToMax;
  $brakingDistance = 0;
  $brakingTime = 0;

  //ブレーキ回数分ループ
  $flg = true;
  for ($i = 0; $i < $car->brakeTimes; $i++) {
    $acceleDistance += $car->distanceToMax;
    $acceleTime += $car->timeToMax;
    $brakingDistance += $car->distanceToStop;
    $brakingTime += $car->timeToStop;
    //加速中、ブレーキ中に進んだ距離
    $driveDistance = round($acceleDistance + $brakingDistance);

    if ($driveDistance > $distance) {
      $flg = false;
      $driveDistance = $distance;
      echo $car->company . "のブレーキ回数は" . ($i + 1) . "回です。\n";
      break;
    }
  }
  if ($flg == true) {
    echo $car->company . "のブレーキ回数は" . $car->brakeTimes . "回です。\n";
  }

  echo $car->company . "が加速中とブレーキ中に進んだ距離は" . number_format($driveDistance) . "mです。\n";

  //完走した時間(sec.)
  $car->totalTime  += round($maxSpeedTime + $acceleTime + $brakingTime);

  //完走した時間を変換
  $car->convertedTime = $calucurator->convertTime($car->totalTime);
  //表示
  echo $car->company . "のタイムは" . $car->convertedTime . "です。\n";
  echo "\n";
}
//順位用配列にいれる
foreach ($cars as $car) {
  $times[] = array('company' => $car->company, 'totalTime' => $car->totalTime);
}
//ソート用配列  
foreach ($times as $key => $value) {
  $sort[$key] = $value['totalTime'];
}

array_multisort($sort, SORT_ASC, $times);

//順位表示  
foreach ($times as $key => $value) {
  $key = $key + 1;
  echo $key . "位は" . $value['company'] . "です。\n";
}
