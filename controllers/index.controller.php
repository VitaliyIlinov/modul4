<?php

class IndexController extends Controller{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Newss();
    }

    public function list()
    {
            $this->data = $this->model->getListIndex();
    }

    public function view()
    {
        $params = App::getRouter()->getParams();

        if (isset($params[0])) {//задан ли первый параметр
            $alias = strtolower($params[0]);
            $this->data = $this->model->getByAlias($alias);
        }
    }

    public function admin_list()
    {
        $this->data = $this->model->getList();
    }

    public function admin_add()
    {

        if ($_POST) {
            $_result = $this->model->save($_POST);
            if ($_result) {
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/index/');
        }
    }

    public function admin_edit()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ($result) {
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/index');
        }

        if (isset($this->params[0])) {
            $this->data= $this->model->getById($this->params[0]);
        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/index/');
        }
    }

    public function admin_delete()
    {
        if (isset($this->params[0])) {
            $result = $this->model->delete($this->params[0]);
            if ($result) {
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/index/');
    }
}