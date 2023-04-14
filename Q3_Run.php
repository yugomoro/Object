<?php
require_once("Calculator.php");

$calculator = new Calculate();
echo "Honda: " . $calculator->getHondaCount() . "台\n";
echo "Nissan: " . $calculator->getNissanCount() . "台\n";
echo "Ferrari: " . $calculator->getFerrariCount() . "台\n";
echo "合計台数: " . $calculator->getTotalCount() . "台\n";
echo "合計金額: " . $calculator->getTotalPrice() . "万円です。\n";
echo "平均金額: 約" . round($calculator->getAveragePrice(), 1) . "万円です。";

?>
