<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('system\Controller');
SimpleRouter::get(URL_SITE, 'SiteController@index');
SimpleRouter::get(URL_SITE.'about', 'SiteController@about');
SimpleRouter::start();