<?php

namespace system\Core;

class Mensagem
{
    private $text;
    private $css;

    public function __toString()
    {
        return $this->renderizar();
    }

    public function renderizar(): string
    {
        return "<div class='{$this->css}'>{$this->text}</div>";
    }

    private function filtrar(string $mensagem): string
    {
        return filter_var($mensagem, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function success(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-success';
        $this->text = $this->filtrar($mensagem);
        return $this;
    }

    public function warning(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-warning';
        $this->text = $this->filtrar($mensagem);
        return $this;
    }
}