<?php

namespace Loyalty;

class Home {

    protected $app;

    public function __construct(&$app) {
        $this->app = $app;
        $app->get('/', array($this, 'home'))->name('home');
    }

    public function home() {
        $this->app->render('home.html');
    }
}
