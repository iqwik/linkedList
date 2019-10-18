<?php

spl_autoload_register(function ($className)
{
    $rootdir = __DIR__;
    $found = false;
    $lib = ['/lib'];
    foreach ($lib as $dir)
    {
        if (is_file($fileName = $rootdir.'/'.$dir.'/'.$className.'.php'))
        {
            require_once($fileName);
            $found = true;
        }
    }
    if (! $found) echo 'Error!';
    return true;
});
