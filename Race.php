<?php

class Race
{
    public function defineRaceDistance()
    {
        $race_distance = mt_rand(300000, 500000);
        return $race_distance;
    }

    function convertSeconds($seconds)
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;

        $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

        return $hms;
    }

    public function startRace($cars)
    {
        echo "--レース開始--\n";
        $race_distance = $this->defineRaceDistance();
        echo "今回のレース距離は、{$race_distance}mです。\n-----\n";

        $half_race_distance = $race_distance / 2;
        $results = [];
        $half_results = [];

        foreach ($cars as $car) {
            $company = $car->getCompany();
            $total_distance = 0;
            $total_time = 0;
            $max_speed_time = 60;
            $counts = $car->brake_counts;
            $reached_half_distance = false;

            for ($x = 0; $x < $counts; $x++) {
                $total_time += $car->timeToMaxSpeed();
                $total_time += $max_speed_time;
                $total_time += $car->timeToStop();
                $total_distance += $car->distanceToMaxSpeed();
                $total_distance += $car->distanceTraveledAtMaxSpeed($max_speed_time);
                $total_distance += $car->distanceToStop();
            }

            $total_distance += $car->distanceToMaxSpeed();
            $total_time += $car->timeToMaxSpeed();

            $max_speed_time = 1;
            while ($total_distance < $race_distance) {
                $total_distance += $car->distanceTraveledAtMaxSpeed($max_speed_time);
                $total_time += $max_speed_time;

                if (!$reached_half_distance && $total_distance >= $half_race_distance) {
                    $reached_half_distance = true;
                    $half_difference_distance = $total_distance - $half_race_distance;
                    $difference_time = $half_difference_distance / $car->getMaxSpeed();
                    $half_total_seconds = $total_time - $difference_time;
                    $formatted_time = $this->convertSeconds($half_total_seconds);

                    $intermediate_results[] = [
                        'company' => $company,
                        'time' => $half_total_seconds
                    ];
                }
            }

            $difference_distance = $total_distance - $race_distance;
            $difference_time = $difference_distance / $car->getMaxSpeed();
            $total_seconds = $total_time - $difference_time;

            $results[$company] = $total_seconds;
        }

        usort($intermediate_results, function ($a, $b) {
            return $a['time'] - $b['time'];
        });

        $rank = 1;
        foreach ($intermediate_results as $result) {
            $company = $result['company'];
            $formatted_time = $this->convertSeconds($result['time']);
            echo "{$company}が中間地点を通過しました。(タイム--{$formatted_time})\n";
            $rank++;
        }

        asort($results);
        $rank = 1;
        echo "<最終結果>\n";
        foreach ($results as $company => $time) {
            $formatted_time = $this->convertSeconds($time);
            echo "{$rank}位: {$company}--タイム({$formatted_time})\n";
            $rank++;
        }
    }
}
