<?php

require_once("Car.php");

class Ferrari extends Car
{
    public function __construct()
    {
        parent::__construct("Ferrari", 2000, 5000, 2, 13, 200);
    }
    private $height = 100;
    private bool $lift_is_upped = false;

    function showStatus()
    {
        echo $this->company . "の現在の車高は" . $this->height . "mmです。加速度は" . $this->acceleration . "m/s²です。\n";
    }

    function upLift()
    {
        if ($this->lift_is_upped == false) {
            $this->acceleration *= 0.8;
            $this->height += 40;
            $this->lift_is_upped = true;
            echo "リフトアップしました。\n";
        } else {
            echo "これ以上リフトアップできません。\n";
        }
    }

    function downLift()
    {
        if ($this->lift_is_upped == true) {
            $this->acceleration = 13;
            $this->height -= 40;
            $this->lift_is_upped = false;
            echo "リフトダウンしました。\n";
        } else {
            echo "これ以上リフトダウンできません。\n";
        }
    }
}
