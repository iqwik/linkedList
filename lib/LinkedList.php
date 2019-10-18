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

        $currentElement = $this->list;
        $nextElement = $currentElement->nextElement;
        $currentElement->nextElement = null;

        while ($nextElement)
        {
            $next = $nextElement->nextElement;
            $nextElement->nextElement = $currentElement->nextElement;
            $currentElement->nextElement = $nextElement;
            $nextElement = $next;
        }
    }

    /*
    public function reverse()
    {
        $currentElement = $this->list;
        $nextElement = $currentElement->nextElement;
        $currentElement->nextElement = null;

        $this->reverseList($currentElement, $nextElement);
    }

    private function reverseList($prev, $current)
    {
        if( is_null($current) ) return $prev;

        $next = $current->nextElement;
        $current->nextElement = $prev;
        return $this->reverseList($current, $next);
    }
    */
}