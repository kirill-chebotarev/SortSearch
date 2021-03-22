<?php

//создание массива
$elements = range(10,110);
shuffle($elements);
$elements[] = 15;

sort($elements);

function binarySearch ($myArray, $num) {

//определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;

    while ($left <= $right) {
//находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left)/2);
//если центральный элемент и есть искомый
        if (!isset($myArray[$middle])) {
            $myArray[$middle] = null;
        }
        if ($myArray[$middle] == $num) {
            return $middle;
        } elseif ($myArray[$middle] > $num) {
//сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        } elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }

    }
    return null;
}

var_dump($elements);
echo "<br>";
$continue = 1;
$result = null;
do {
    $result = binarySearch($elements, 15);
    echo $result;
    if (is_null($result)) $continue = 0;
    unset($elements[$result]);
} while ($continue);
echo "<br>";
var_dump($elements);








