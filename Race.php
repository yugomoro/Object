<?php
require_once("Ferrari.php");
require_once("Honda.php");
require_once("Nissan.php");
require_once("Toyota.php");

class Race {
    private $cars = array();

    public function __construct() {
        $this->cars[] = new Ferrari();
        $this->cars[] = new Honda();
        $this->cars[] = new Nissan();
        $this->cars[] = new Toyota();
    }

    public function start() {
        $distance = 5000; // レース距離
        $brake_probability = 0.2; // ブレーキを踏む確率

        // レースの進行状況を表す変数
        $race_progress = array(
            "Ferrari" => 0,
            "Honda" => 0,
            "Nissan" => 0,
            "Toyota" => 0
        );

        while ($distance > 0) {
            // 各車両の進行状況を更新する
            foreach ($this->cars as $car) {
                if ($distance > 0) {
                    // ブレーキを踏むかどうかランダムに決定する
                    $brake = (mt_rand(0, 99) / 100) < $brake_probability;

                    if (!$brake) {
                        // ブレーキを踏まない場合、加速度に基づいて進行状況を更新する
                        $progress = $car->getActualAcceleration() * $car->getPassenger();
                        $race_progress[$car->getCompany()] += $progress;
                        $distance -= $progress;
                    }
                }
            }
        }

        // ゴールした順位を求める
        arsort($race_progress);
        $rank = array();
        $i = 1;
        foreach ($race_progress as $company => $progress) {
            $rank[] = "$i: $company";
            $i++;
        }

        // 2.5km地点での順位を表示する
        echo "2.5km地点の順位: ";
        for ($i = 0; $i < count($rank); $i++) {
            echo $rank[$i] . " ";
            if ($i == 1) {
                break;
            }
        }
        echo "\n";

        // ゴール地点での順位を表示する
        echo "ゴール地点の順位: ";
        foreach ($rank as $r) {
            echo $r . " ";
        }
        echo "\n";
    }
}
?>
