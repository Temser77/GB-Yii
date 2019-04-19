<?php
// ЗАДАНИЕ 1 Получить число шагов для заданного алгоритма.

// убрал незначимые значения, структуру массива сохранил
$prices = [
    ['price' => 21999],
    ['price' => 21550],
    ['price' => 21950],
    ['price' => 21350],
    ['price' => 21050],
];

function ShellSort($elements)
{
    $k = 0;
    $length = count($elements); // 5
    $gap[0] = (int)($length / 2);  // 2
    while ($gap[$k] > 1) {
        $k++; // 1
        $gap[$k] = (int)($gap[$k - 1] / 2); // $gap[1] = (int) $gap[0] / 2; $gap[1] = 1;  больше в этот цикл не зайдем
    }
    // имеем $gap = [2, 1];

    for ($i = 0; $i <= $k; $i++) {
        // т.к. $k = 1, циклы запустится 2 раза
        $step = $gap[$i]; // $step = $gap[0] = 2
        for ($j = $step; $j < $length; $j++) {
            //
            $temp = $elements[$j];
            // первый проход $j == 2; $length == 5, $temp = $elements[2] = ['price' => 21950]
            $p = $j - $step; // $p = 2 - 2 = 0;
            while ($p >= 0 && $temp['price'] < $elements[$p]['price']) {
                // первый проход $p == 0, $temp['price] == 21950, $elements[0]['price'] == 21999, условие соблюдается.
                $elements[$p + $step] = $elements[$p]; // $elements[2] = $elements[0];
                $p = $p - $step; // $p = -2; на второй круг не заходим
                /* после первого прохода получаем
                $prices = [
                    ['price' => 21999],
                    ['price' => 21550],
                    ['price' => 21999],
                    ['price' => 21350],
                    ['price' => 21050],
                ];
                */
            }
            $elements[$p + $step] = $temp; // elements[0] = ['price' => 21950]
        }
    }
    return $elements;
}

// 1 проход $i = 0; $step = 2; $j = 2; $p = 0;
// 2 проход $i = 0; $step = 2; $j = 3; $p = 1;
// 3 проход $i = 0; $step = 2; $j = 4; $p = 2;
// 4 проход $i = 0; $step = 2; $j = 4; $p = 0;
// 5 проход $i = 1; $step = 1; $j = 1; $p = 0;
// 6 проход $i = 1; $step = 1; $j = 2; $p = 1;
// 7 проход $i = 1; $step = 1; $j = 2; $p = 0;
// 8 проход $i = 1; $step = 1; $j = 3; $p = 2;
// 9 проход $i = 1; $step = 1; $j = 3; $p = 1;
// 10 проход $i = 1; $step = 1; $j = 3; $p = 0;
// 11 проход $i = 1; $step = 1; $j = 4; $p = 3;
// 12 проход $i = 1; $step = 1; $j = 4; $p = 2;
// 13 проход $i = 1; $step = 1; $j = 4; $p = 1;
// 14 проход $i = 1; $step = 1; $j = 4; $p = 0;

// print_r(ShellSort($prices));

// ИТОГО имеем 14 шагов



// ЗАДАНИЕ 2 Вычислить сложность алгоритма.

// Сложность алгоритма О(N * log(N));
// В нашем случае количество перебираемых значений - 5.
// Тогда сложность алгоритма будет О(5 * log(5)) = О(5 * 2,3) = 12;



// ЗАДАНИЕ 3 Реализовать функционал сортировки слиянием.

// Сначала сделаем функцию на слияние двух массивов
function Merge(array $left, array $right)
{
    $sortedArray = [];
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] <= $right[0]) {
            $sortedArray[] = array_shift($left);
        } else {
            $sortedArray[] = array_shift($right);
        }
    }
    while (count($left) > 0) {
        $sortedArray[] = array_shift($left);
    }
    while (count($right) > 0) {
        $sortedArray[] = array_shift($right);
    }
    return $sortedArray;
}

// теперь используя функцию слияния массивов сделаем рекурсивную функцию сортировки слиянием
function MergeSort(array $unsortedArray)
{
    $length = count($unsortedArray);
    if ($length == 1) {
        return $unsortedArray[0];
    }
    $newArray = [];
    $i = 0;
    while ($i < $length) {
        $j = $i + 1;
        if ($j == $length) {
            $newArray[] = $unsortedArray[$i];
            break;
        }
        is_array($unsortedArray[$i]) ? $left = $unsortedArray[$i] : $left[0] = $unsortedArray[$i];
        is_array($unsortedArray[$j]) ? $right = $unsortedArray[$j] : $right[0] = $unsortedArray[$j];
        $newArray[] = merge($left, $right); //$newArray = [[3, 5], [1, 9]];
        $i += 2;
    }
    return MergeSort($newArray);
}

// Проверяем
$myArray = [3, 5, 1, 9, 8, 14, 0, 7, 12];
print_r(MergeSort($myArray));
