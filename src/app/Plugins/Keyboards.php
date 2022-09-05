<?php

namespace App\JavokhirMedia;

class Keyboards
{

    public Plugins $plugins;

    public function __construct()
    {
        $this->plugins = new Plugins();
    }

    public function start()
    {
        return $this->plugins->buildResizeKeyboard();
    }

}