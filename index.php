<?php

require_once 'autoload.php';

$list = new LinkedList();
$list->add('Вася');
$list->add('Петя');
$list->add('Иван');
$list->add('Маша');
$list->add('Яна');
?><pre><?php var_dump($list);?></pre><?
//$list->delete('Яна');
$list->reverse();
?><pre><?php var_dump($list);?></pre><?