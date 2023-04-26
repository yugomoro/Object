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
foreach ($cars1 as $value) {
    $company = $value->getCompany();
    $price = $value->getPrice();
    $capacity = $value->getCapacity();
    $acceleration = $value->getAcceleration();
    echo $company . "の価格は" . $price . "万円です。定員は" . $capacity . "人で、加速度は" . $acceleration . "m/s²です。\n";
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

echo "Honda車の生成台数: " . $calculate->getHondaCount() . "台\n";
echo "Nissan車の生成台数: " . $calculate->getNissanCount() . "台\n";
echo "Ferrari車の生成台数: " . $calculate->getFerrariCount() . "台\n";
echo "車の合計台数: " . $calculate->getTotalCount() . "台\n";
echo "合計金額: " . number_format($calculate->getTotalPrice()) . "万円\n";
echo "平均金額: " . number_format($calculate->getAveragePrice()) . "万円\n";
echo "\n";


echo "<Q4>\n";
$ferrari4 = new Ferrari();
$honda4 = new Honda();
$nissan4 = new Nissan();

$cars4 = array($honda4, $nissan4, $ferrari4,);
foreach ($cars4 as $value) {
    $company = $value->getCompany();
    $capacity = $value->getCapacity();
    $passenger = $value->getPassenger();
    $actual_acceleration = $value->getActualAcceleration();
    echo $company . "の定員は" . $capacity . "です。\n" .
        "今回の乗車人数は" . $passenger . "人のため、実際の加速性能は" . $actual_acceleration . "m/s²です。\n";
}
echo "\n";


echo "<Q6>\n";
$race = new Race();
$ferrari6 = new Ferrari();
$honda6 = new Honda();
$nissan6 = new Nissan();
$toyota6 = new Toyota();

echo "今回の" . $toyota6->getCompany() . "の価格は" . $toyota6->getPrice() . "万円なので、加速度は" . $toyota6->getAcceleration() . "m/s²です。\n";

$cars6 = array($honda6, $nissan6, $ferrari6, $toyota6);
foreach ($cars6 as $value) {
    $company = $value->getCompany();
    $passenger = $value->getPassenger();
    $actual_acceleration = $value->getActualAcceleration();
    echo $company . "の乗車人数は" . $passenger . "人のため、実際の加速性能は" . $actual_acceleration . "m/s²です。\n";
}

$cars6 = [$ferrari6, $honda6, $nissan6, $toyota6];

echo "-----レース開始-----\n" . "レースの距離は" . $race->defineRaceDistance() / 1000 . "kmです。\n";

$positions = [];
$speeds = [];
$brakes = [];

for ($i = 0; $i < count($cars6); $i++) {
    $positions[$i] = 0;
    $speeds[$i] = 0;
    $brakes[$i] = [];
}

// レースを行う
for ($t = 0; $t < 1; $t++) {
    // 各車の速度を計算する
    for ($i = 0; $i < count($cars6); $i++) {
        // 車の速度を計算する
        $speeds[$i] = $cars6[$i]->calcFinalSpeed($race->defineRaceDistance() - $positions[$i], 1);
    }

    // 各車の距離を計算する
    for ($i = 0; $i < count($cars6); $i++) {
        // ブレーキを踏んでいる場合、速度を減速する
        if (count($brakes[$i]) > 0 && $t >= $brakes[$i][0]) {
            $speeds[$i] = max(0, $speeds[$i] - $cars6[$i]->getDeceleration());
            array_shift($brakes[$i]);
        }

        // 車の距離を計算する
        $positions[$i] += $speeds[$i];
    }

    // 中間地点に到達した場合、順位とタイムを表示する
    if ($positions[0] >= $race->defineRaceDistance() / 2 || $positions[1] >= $race->defineRaceDistance() / 2 || $positions[2] >= $race->defineRaceDistance() / 2 || $positions[3] >= $race->defineRaceDistance() / 2) {
        // 順位を計算する
        $rankings = array_keys($positions, max($positions));
        $times = array_map(function ($car) use ($positions, $speeds) {
            return $speeds[$car] === 0 ? 0 : round($positions[$car] / $speeds[$car]);
        }, $rankings);

        echo "中間地点の順位：\n";
        for ($i = 0; $i < count($rankings); $i++) {
            $time = $times[$i];
            $company = $cars6[$rankings[$i]]->getCompany();
            echo "  " . ($i + 1) . "位：" . $company . "（" . $time . "秒）\n";
        }
    }

    // レースが終了した場合、順位とタイムを表示して終了する
    if (in_array($race->defineRaceDistance(), $positions)) {
        $rankings = array_keys($positions, max($positions));
        $times = array_map(function ($car) use ($positions, $speeds) {
            return $speeds[$car] === 0 ? 0 : round($positions[$car] / $speeds[$car]);
        }, $rankings);

        echo "レース終了！\n";
        for ($i = 0; $i < count($rankings); $i++) {
            $time = $times[$i];
            $company = $cars6[$rankings[$i]]->getCompany();
            echo "  " . ($i + 1) . "位：" . $company . "（" . $time . "秒）\n";
        }

        break;
    }
}
