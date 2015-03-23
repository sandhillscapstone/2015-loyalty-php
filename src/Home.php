<?php

namespace Loyalty;

class Home {

    protected $app;

    public function __construct(&$app) {
        $this->app = $app;
        $app->get('/', array($this, 'home'))->name('home');
        $app->get('/about', array($this, 'about'))->name('about');
    }

    public function about() {
        echo "Loyalty App, created by Sandhills Community College CSC289 class, Spring 2015.";
    }

    public function home() {
        $this->app->render('home.html');
    }
}
