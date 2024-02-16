<?php

namespace system\Core;
use system\Support\Template;

class Controller
{
    protected Template $template;

    public function __construct(string $dir)
    {
        $this->template = new Template($dir);
    }
}
