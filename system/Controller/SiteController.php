<?php

namespace system\Controller;
use system\Core\Controller;
use Twig\Template;

class SiteController extends Controller
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function index() :void
    {
        echo $this->template->render('index.html', [
            'title' => 'Teste de título',
            'subtitle' => 'Teste de subtítulo'
        ]);
    }

    public function about() :void
    {
        echo $this->template->render('about.html', [
            'title' => 'Sobre nós',
            'subtitle' => 'lorem ipsum amet ipsum'
        ]);    }
}
