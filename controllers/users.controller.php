<?php

class UsersController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function admin_login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $user['is_active'] && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/admin/index/list');
        }
    }

    public function admin_logout()
    {
        Session::destroy();
        Router::redirect('/admin/');
    }

    public function login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $user['is_active'] && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Router::redirect('/');
            }else{
                Session::setFlash('Try again');
            }
        }
    }
    

    public function register(){
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])&& isset($_POST['email'])) {
            $new_user=$this->model->addUser($_POST);
            if($new_user){
                Session::set('login', $new_user['login']);
                Session::setFlash('Congratulation');
            }
            //Router::redirect('/');
        }
    }

    public function logout()
    {
        Session::destroy();
        Router::redirect('/');
    }
}