<?php

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

function merge_sort($array = [])
{
    if (count($array) <= 1) // возвращаем уже отсортированный массив, если в нем 1 элемент
    {
        return $array;
    }
    else
    {
        $left = [];
        $right = [];
        $half = count($array) % 2 === 0 ? count($array) / 2 : round(count($array) / 2); // делим пополам

        for ($i = 0; $i < $half; $i++)
        {
            $left[] = $array[$i];
        }

        for ($j = count($array) - 1; $j >= $half; $j--)
        {
            $right[] = $array[$j];
        }

        $left = merge_sort($left);
        $right = merge_sort($right);

        $res = merge($left, $right);

        return $res;
    }
}

function merge($left, $right)
{
    $result = [];

    while (count($left) > 0 && count($right) > 0)
    {
        if (reset($left) <= reset($right))
        {
            $result[] = reset($left);
            array_shift($left);
        }
        else
        {
            $result[] = reset($right);
            array_shift($right);
        }
    }

    while (count($left) > 0)
    {
        $result[] = reset($left);
        array_shift($left);
    }

    while (count($right) > 0)
    {
        $result[] = reset($right);
        array_shift($right);
    }

    return $result;
}
