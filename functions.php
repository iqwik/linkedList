<?php
// сортировка пузырьком
function bubble_sort($array = [])
{
    $i = 0;
    $temp = null;
    $is_swap = false;
    $array_size = count($array);

    while ($i < $array_size)
    {
        if ($array_size != ($i + 1) && $array[$i] > $array[$i + 1]) // если след элем существует и текущий элем > след.
        {
            $temp = $array[$i + 1]; // во временную запишем след элем
            $array[$i + 1] = $array[$i]; // в след элем запишем ссылку на текущий
            $array[$i] = $temp; // в текущий запишем ссылку на след элем
            $is_swap = true; // выставим флаг в true
        }
        $i++;
        if ($array_size == $i && $is_swap) // последний элем и флаг в true
        {
            $temp = null;
            $is_swap = false;
            $i = 0;
        }
    }

    return $array;
}

// сортировка слиянием
function merge_sort($array = [])
{
    if (count($array) <= 1) // возвращаем уже отсортированный массив, если в нем 1 элемент
    {
        return $array;
    }
    else
    {
        list($left, $right) = array_chunk($array, ceil(count($array)/2)); // делим пополам

        $left = merge_sort($left); // рекурсивно делим пополам пока не будет 1 элемента
        $right = merge_sort($right); // рекурсивно делим пополам пока не будет 1 элемента
        // теперь у нас каждый элемент в отдельном массиве
        return merge($left, $right); // объединяем, сортируя, в 1 массив
    }
}
function merge($left, $right)
{
    $result = [];
    // если есть 2 массива в которых по 1 значению
    // - сравниваем и пушим в наш результатирующий массив
    while (!empty($left) && !empty($right))
    {
        // если значение с из левого массива меньше, чем из правого
        // - все ок, порядок верный
        if ($left[0] < $right[0])
        {
            $result[] = $left[0];
            // после добавления элемента в новый массив result
            // удаляем его из старого
            array_shift($left);
        }
        // иначе, сначала пушим из правого массива
        else
        {
            $result[] = $right[0];
            array_shift($right);
        }
    }

    // только слева есть
    while (!empty($left))
    {
        $result[] = $left[0];
        array_shift($left);
    }

    // только справа есть
    while (!empty($right))
    {
        $result[] = $right[0];
        array_shift($right);
    }

    return $result;
}
