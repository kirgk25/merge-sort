<?php

function getRandomArray(int $length): array
{
    $array = [];

    while ($length--) {
        $array[] = random_int(10, 99);
    }

    return $array;
}

function mergeSort(array $array): array
{
    if (count($array) < 2) {
        return $array;
    }

    $middle = count($array) / 2;

    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge(array $left, array $right): array
{
    $result = [];

    while ($left && $right) {
        $result[] = $left[0] < $right[0]
            ? array_shift($left)
            : array_shift($right);
    }

    while ($left) {
        $result[] = array_shift($left);
    }

    while ($right) {
        $result[] = array_shift($right);
    }

    return $result;
}

$array = getRandomArray(10);
$sortedArray = mergeSort($array);

echo 'Array: ' . PHP_EOL . implode(', ', $array) . PHP_EOL . PHP_EOL .
     'Sorted array: ' . PHP_EOL . implode(', ', $sortedArray) . PHP_EOL;

