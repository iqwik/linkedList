<?php

class LinkedList
{
    public $list;

    public function __construct()
    {
        $this->list = null;
    }

    public function add($value)
    {
        $this->list = new ListElement($value, $this->list);
    }

    public function delete($value)
    {
        $prevElement = null;
        $currentElement = $this->list;

        while ($currentElement)
        {
            if($value === $currentElement->value)
            {
                if( ! is_null($prevElement) ){
                    $prevElement->value = $currentElement->nextElement;
                } else {
                    $this->list = $currentElement->nextElement;
                }

                $currentElement = null;
            }
            $prevElement = $currentElement;
            $currentElement = $currentElement->nextElement;
        }
    }

    public function reverse()
    {
        $current = $this->list; // текущий элемент
        $prev = null; // пред. элем

        while(!is_null($current)) // пока элемент не null
        {
            $head = $current->nextElement; // временный элем. - хранит ссылку на след.элем
            $current->nextElement = $prev; // в след. элем запишем значение из пред.
            $prev = $current; // в пред. элем запишем текущий элем
            $current = $head; // в текущ элем запишем временный
        }
    }
}