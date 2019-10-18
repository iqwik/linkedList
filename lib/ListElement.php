<?php

class ListElement
{
    public $value;
    public $nextElement;

    public function __construct($value, $nextElement = null)
    {
        $this->set($value, $nextElement);
    }

    private function set($value, $nextElement)
    {
        $this->value = $value;
        $this->nextElement = $nextElement;
    }
}
