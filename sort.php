<?php

const COUNT = 1000;
const MIN_RAND = 1;
const MAX_RAND = 3000;


function _randArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND):array
{
    if ($count != COUNT && $count > $maxRand - $minRand) {
        $minRand = 1;
        $maxRand = $count * 3;
    }
    $myArray = [];
    for ($i = 0; $i < $count; $i++) {
        $num = mt_rand($minRand, $maxRand);
        $myArray[] = $num;
    }
    return $myArray;
}

function getArr(): array
{
    return _randArray(1000000);
}

$arr = getArr();
$start = microtime(true);
ksort($arr);

echo "Сортировка по ключу по возрастанию: ksort():".( microtime(true) - $start).PHP_EOL . "<br>";

$arr = getArr();
$start = microtime(true);
asort($arr);
echo "Сортировка по значению по возрастанию: asort():".( microtime(true) - $start).PHP_EOL . "<br>";

$arr = getArr();
$start = microtime(true);
natsort($arr);
echo "Сортировка по значению по естественному порядку: natsort():".( microtime(true) - $start).PHP_EOL . "<br>";

$arr = getArr();

function cmp($a, $b):int
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$start = microtime(true);
usort($arr, 'cmp');
echo "Сортировка по значению по порядку, определяемому пользователем: usort(): ".( microtime(true) - $start).PHP_EOL . "<br>";

$arr = getArr();
$start = microtime(true);
sort($arr);
echo "Сортировка по значению по возрастанию: sort():".( microtime(true) - $start).PHP_EOL . "<br>";


