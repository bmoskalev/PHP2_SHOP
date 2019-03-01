<?php

namespace app\services;


class Autoloader
{
    private $extension = ".php";
    public function loadClass($class){
        $file = str_replace(["app", "\\"],  [ROOT_DIR, "/"], $class) . $this->extension;
        if (file_exists($file)) {
            include $file;
        }
    }
}


