
<?php

class CarProduce
{
    private $cars = [Honda::class, Nissan::class, Ferrari::class];

    public function generateRandomCar()
    {
        $rand = mt_rand(0, count($this->cars) - 1);
        $class = $this->cars[$rand];
        return new $class();
    }
}
