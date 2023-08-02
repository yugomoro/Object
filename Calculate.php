<?php

class Calculate
{
    public static function calculateTotalPrice(CarProduce $car_produce)
    {
        $total_price = 0;
        $cars_generated = $car_produce->getCarsGenerated();
        foreach ($cars_generated as $car) {
            $total_price += $car->getPrice();
        }
        return $total_price;
    }

    public static function calculateAveragePrice(CarProduce $car_produce)
    {
        $average_price = 0;
        $total_price = self::calculateTotalPrice($car_produce);
        $total_count = $car_produce->getTotalCount();
        $average_price = $total_price / $total_count;
        return round($average_price, 2);
    }

    public static function formatJapaneseCurrency($amount)
    {
        if ($amount >= 10000) {
            $man = floor($amount / 10000);
            $yen = $amount % 10000;
            $formatted = ($man > 0 ? "{$man}億" : '') . ($yen > 0 ? "{$yen}" : '') . '万円';
        } else {
            $formatted = "{$amount}万円";
        }
        return $formatted;
    }

    public static function outputQ4(CarProduce $car_produce)
    {
        $total_price = self::calculateTotalPrice($car_produce);
        $total_price_formatted = self::formatJapaneseCurrency($total_price);
        $average_price = self::calculateAveragePrice($car_produce);
        $average_price_formatted = self::formatJapaneseCurrency($average_price);

        echo "合計金額: {$total_price_formatted}\n";
        echo "平均金額: {$average_price_formatted}\n";
    }
}
