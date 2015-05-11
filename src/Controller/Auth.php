<?php
namespace Loyalty\Controller;
use \Loyalty\Datalayer\UserRepository;
use \Loyalty\Model\User;

class Auth {
    protected $app;

    public function __construct(&$app) {
        $this->app = $app;
        $app->get('/login', array($this, 'login'))->name('login');
        $app->post('/login', array($this, 'login_post'))->name('login');
        $app->get('/logout', array($this, 'logout'))->name('logout');
        $app->get('/users/add', array($this, 'users_add'));
        $app->get('/users/', array($this, 'users_view'));
        $app->post('/users/add', array($this, 'users_add_post'));
        $app->get('/users/delete/:id', array($this, 'users_delete'));

        $app->isLoggedIn = function () {
            return $this->isLoggedIn();
        };
        $app->isAdmin = function () {
            return $this->isAdmin();
        };

        $app->requiresLogin = function () {
            if (!$this->isLoggedIn()) {
                $this->app->redirect('/login');
            };
        };
        $app->requiresAdmin = function () {
            if (!$this->isAdmin()) {
                $this->logout();
            };
        };

    }

    public function login() {
        if ($this->isLoggedIn()) {
            $this->app->response->redirect('/search');
        }
        $this->app->render('login.html');
    }

    public function login_post() {
        $username = $this->app->request->post('userName');
        $password = $this->app->request->post('password');

        $UserRepository = new UserRepository($this->app->db);
        $User = $UserRepository->GetByUserName($username);
        if (password_verify($password, $User->Password)) {
            $_SESSION['UserID'] = $User->id();
            $_SESSION['UserName'] = $User->UserName;
            $_SESSION['Admin'] = $User->Admin;
        }
        $this->app->response->redirect('/login');
    }

    private function isLoggedIn() {
        return (array_key_exists('UserID', $_SESSION));
    }

    private function isAdmin() {
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

    public function users_add() {
        $this->app->requiresAdmin;
        $this->app->render('user-add.html');
    }

    public function users_add_post() {
        $this->app->requiresAdmin;
        $UserRepository = new UserRepository($this->app->db);
        if ($this->app->request->post('admin') === null) {
            $admin = false;
        } else {
            $admin = true;
        }
        $username = $this->app->request->post('username');
        $password = $this->app->request->post('password');
        $User = new User($username, $password, $admin);
        $UserRepository->Save($User);
        $this->app->redirect('/accounting');
    }

    public function users_view() {
        $this->app->requiresAdmin;
        $UserRepository = new UserRepository($this->app->db);
        $Users = $UserRepository->GetAll();
        $this->app->render('user-view.html', array('data' => $Users));
    }

    public function users_delete($id) {
        $this->app->requiresAdmin;
        $UserRepository = new UserRepository($this->app->db);
        $UserRepository->Delete($id);
        $this->app->redirect('/users');
    }
}
