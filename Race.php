<?php

require_once("Ferrari.php");
require_once("Honda.php");
require_once("Nissan.php");
require_once("Toyota.php");

class Race
{
    private array $cars;

    public function __construct()
    {
        $this->cars = [
            new Ferrari(),
            new Honda(),
            new Nissan(),
            new Toyota()
        ];
    }

    public function start()
    {
        // レース距離を50~100kmの間でランダムに決める
        $race_distance = mt_rand(50, 100);
        echo "レース距離は{$race_distance}kmです。\n\n";

        // レース開始
        $elapsed_time = 0;
        while (true) {
            // 車ごとに加速度を計算し、走行距離を進める
            foreach ($this->cars as $car) {
                $distance = $car->actual_acceleration * pow($elapsed_time, 2) / 2;
                if ($distance >= $race_distance * 1000) {
                    // ゴールしたらゴール時間を設定し、ループを抜ける
                    $car->goal_time = $elapsed_time;
                    break 2;
                }
                $car->distance = $distance;
            }

            // ブレーキを踏むかどうかをランダムに決める
            $is_brake = mt_rand(0, 1);
            if ($is_brake) {
                // 車ごとにブレーキをかける
                foreach ($this->cars as $car) {
                    $car->brake();
                }
                echo "ブレーキを踏みました。\n";
            }

            // 経過時間を進める
            $elapsed_time += 1;
        }

        // ゴール順にソート
        usort($this->cars, function ($a, $b) {
            return $a->goal_time - $b->goal_time;
        });

        // 中間地点での順位を出力
        echo "\n中間地点での順位は以下の通りです。\n";
        foreach ($this->cars as $index => $car) {
            $distance = $car->distance;
            if ($distance >= $race_distance * 1000 / 2) {
                echo ($index + 1) . "位: " . $car->getCompany() . "\n";
            }
        }

        // ゴール後の順位を出力
        echo "\nゴール後の順位は以下の通りです。\n";
        foreach ($this->cars as $index => $car) {
            echo ($index + 1) . "位: " . $car->getCompany() . " (ゴール時間: " . $car->goal_time . "秒)\n";
        }
    }
}

?>
