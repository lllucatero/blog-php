<?php

namespace system\Support;
use Twig\Lexer;
use Twig\Environment;
use system\Core\Helpers;
use Twig\TwigFunction;

class Template
{
    private \Twig\Environment $twig;

    public function __construct(string $dir)
    {
        $loader = new \Twig\Loader\FilesystemLoader($dir);
        $this->twig = new \Twig\Environment($loader);
        $lexer = new Lexer($this->twig, array(
            $this->helpers()
        ));
        $this->twig->setLexer($lexer);
    }

    public function render(string $view, array $dados): string
    {
        return $this->twig->render($view, $dados);
    }

    private function helpers(): void
    {
        array(
            $this->twig->addFunction(
                new \Twig\TwigFunction('url', function
                (string $url = null){
                    return Helpers::url($url);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('saudacao', function(){
                    return Helpers::saudacao();
                })
            )
        );
    }
}