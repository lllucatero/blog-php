<?php

namespace system\Support;

use Twig\Environment;

class Template
{
    private \Twig\Environment $twig;

    public function __construct(string $dir)
    {
        $loader = new \Twig\Loader\FilesystemLoader($dir);
        $this->twig = new \Twig\Environment($loader);
    }

    public function render(string $view, array $dados)
    {
        return $this->twig->render($view, $dados);
    }
}
