<?php

class Race
{
    public $race_distance;

    public function defineRaceDistance()
    {
        $race_distance = mt_rand(300000,500000);
        return $race_distance;
    }

    public function defineBrakeCounts()
    {
        $brake_counts = rand(1,20);
        return $brake_counts;
    }
}