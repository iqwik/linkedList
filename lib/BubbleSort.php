<?php

class BubbleSort
{
    public $array = [];
    private $is_swap = false;
    private $temporary = null;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function run()
    {
        $this->iterate();

        $this->temporary = null;
        return $this->array;
    }

    private function iterate()
    {
        $i = 0;
        $array_size = count($this->array);

        while ($i < $array_size)
        {
            $this->compare($i);
            $i++;
            if ($array_size == $i && $this->is_swap) // последний элемент массива и флаг в true
            {
                $this->is_swap = false;
                $i = 0;
            }
        }
    }

    private function compare($i)
    {
        if (count($this->array) != ($i + 1) && $this->array[$i] > $this->array[$i + 1]) // если существует след.элем и текущий больше след.
        {
            $this->temporary = $this->array[$i];  // сохраним во временную ссылку на текущий элем
            $this->array[$i] = $this->array[$i + 1]; // меняем местами в текущий сохраним ссылку на след.
            $this->array[$i + 1] = $this->temporary; // в след. сохраним текущий
            $this->is_swap = true;
            ?><pre><?php print_r('i: '.$i."\ntemporary: ".$this->temporary."\nсравним: ".$this->array[$i].' > '.$this->array[$i + 1]." ?\nследующее значение запишем из буффера: ".$this->array[$i + 1].' = '.$this->temporary."\nis_swap: "); var_dump($this->is_swap);?></pre><?
        }
    }
}