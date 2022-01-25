<?php

function printResult($array1, $array2) {
    echo 'Количество элементов в первом множестве: ' . count($array1) . '<br>';
    echo 'Количество элементов во втором множестве: ' . count($array2) . '<br>';
    echo '<hr>';

    echo 'Отсортированное первое множество: { ' . arrayToString(quickSort($array1)) . '} <br>';
    echo 'Отсортированное второе множество: { ' . arrayToString(quickSort($array2)) . '} <br>';
    echo '<hr>';

    echo 'Минимальный элемент первого множества : ' . min($array1) . '<br>';
    echo 'Максимальный элемент первого множества : ' . max($array1) . '<br>';
    echo 'Минимальный элемент второго множества : ' . min($array2) . '<br>';
    echo 'Максимальный элемент второго множества : ' . max($array2) . '<br>';
    echo '<hr>';

    echo 'Пересечение множеств: { ' . arrayToString(array_intersect($array1, $array2)) . '} <br>';
    echo '<hr>';

    echo 'Разность множеств: { ' . arrayToString(array_diff($array1, $array2)) . '} <br>';
    echo '<hr>';

    echo 'Первое множество в обратном порядке: { ' . arrayToString(reverseArray($array1)) . '} <br>';
    echo '<hr>';

    echo 'Произведение элементов второго множества: ' . multiplyArray($array2) . '<br>';
    echo '<hr>';

    shuffle($array1);
    echo 'Перемешанное первое множество: { ' . arrayToString($array1) . '} <br>';
    echo '<hr>';
}

// Меняет местами значения двух переменных
function swap(&$a, &$b) {
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}

// Возвращает массив с обратным порядком элементов
function reverseArray($array) {
    $n = count($array);
    for ($i = 0; $i < $n/2; $i++) {
        swap($array[$i], $array[$n - 1 - $i]);
    }

    return $array;
}

// Алгоритм быстрой сортировки, возращается отсортированный массив
function quickSort($array) {
    if (count($array) <= 1) {
        return $array;
    }

    $left = [];
    $center = [];
    $right = [];

    $base = $array[intval((count($array)/2))];

    foreach ($array as $item) {
        if ($item < $base) {
            $left[] = $item;
        } elseif ($item > $base) {
            $right[] = $item;
        } else {
            $center[] = $item;
        }
    }

    return array_merge(quickSort($left), $center, quickSort($right));
}

// Возвращает произведение элементов массива
function multiplyArray($array) {
    $result = 1;
    foreach ($array as $item) {
        $result *= $item;
    }
    return $result;
}

function arrayToString($array) {
    $result = "";
    foreach ($array as $item) {
        $result .= $item . ' ';
    }
    return $result;
}