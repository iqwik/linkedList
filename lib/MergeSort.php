<?php

class MergeSort
{
    public $array = [];
   
    public function __construct($array)
    {
        $this->array = $array;
    }

    public function run()
    {
        $this->merge_sort($this->array);
    }

    private function merge_sort($array)
    {
        if(count($array) <= 1)
        {
            return $array;
        }
        else
        {
            $left = [];
            $right = [];
            $half = count($array) % 2 === 0 ? count($array)/2 : round(count($array)/2);

            for ($i = 0; $i < $half; $i++)
            {
                $left[] = $array[$i];
            }

            for ($j = count($array) - 1; $j >= $half; $j--)
            {
                $right[] = $array[$j];
            }

            $left = $this->merge_sort($left);
            $right = $this->merge_sort($right);

            $this->array = $this->merge($left, $right);
            return $this->array;
        }
    }

    private function merge($left, $right)
    {
        $temp_array = [];

        while (count($left) > 0 && count($right) > 0)
        {
            if (reset($left) < reset($right))
            {
                $temp_array[] = reset($left);
                array_shift($left);
            }
            else
            {
                $temp_array[] = reset($right);
                array_shift($right);
            }
        }

        while (count($left) > 0)
        {
            $temp_array[] = reset($left);
            array_shift($left);
        }

        while (count($right) > 0)
        {
            $temp_array[] = reset($right);
            array_shift($right);
        }

        return $temp_array;
    }
}