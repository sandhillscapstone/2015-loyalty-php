<?php
namespace Loyalty\Controller;

class Auth {
    protected $app;

    public function __construct(&$app) {
        $this->app = $app;
        $app->get('/login', array($this, 'login'))->name('login');
        $app->post('/login', array($this, 'login_post'))->name('login');
        $app->get('/logout', array($this, 'logout'))->name('logout');
    }

    public function login() {
        if ($this->IsLoggedIn()) {
            $this->app->response->redirect('/search');
        }
        $this->app->render('login.html');
    }

    public function login_post() {
        $username = $this->app->request->post('userName');
        $password = $this->app->request->post('password');
        $pq = $this->app->db->prepare("select id, UserName, Admin from Users where UserName = :username and Password = :password");
        $pq->execute(array('username' => $username, 'password' => $password));
        $row = $pq->fetch();
        print_r($row);
        if ($row !== FALSE) {
            $_SESSION['UserID'] = $row['id'];
            $_SESSION['UserName'] = $row['UserName'];
            $_SESSION['Admin'] = $row['Admin'];
            //$this->app->response->redirect('/search');
        }
        $this->app->response->redirect('/login');
    }

    public function IsLoggedIn() {
        return (array_key_exists('UserID', $_SESSION));
    }

    public function IsAdmin() {
        if (array_key_exists('Admin', $_SESSION)) {
            if ($_SESSION['Admin'] == 1) {
                return true;
            }
        }
        return false;
    }

    public function logout() {
        session_destroy();
        $this->app->redirect('/login');
    }
}