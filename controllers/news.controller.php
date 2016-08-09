<?php

class NewsController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Newss();
    }

    public function list()
    {

        $params = App::getRoutes()->getParams();
//        print_r($params);
        if (isset($_GET['pages'])) {
           // echo 'enter in get method';
            $page = $_GET['pages']-1;
            $this->data = $this->model->getNewsListByPage($page);
            $this->data[]['count'] = $this->model->getCountPages();
//            echo "<pre>";
//            print_r($this->data);
            return VIEW_PATH . DS . App::getRoutes()->getController() . DS . 'pages.php';
        }elseif (isset($params)) {
            $id = $params[0];
            $this->data = $this->model->getNewsListById($id);
            
        } else {
            $this->data = $this->model->getNewsListByPage();
            $this->data[]['count'] = $this->model->getCountPages();
            return VIEW_PATH . DS . App::getRoutes()->getController() . DS . 'pages.php';
        }
    }

    public function tag()
    {
        $params = App::getRoutes()->getParams();
        if (isset($params)) {
            $id = $params[0];
            $this->data = $this->model->getNewsListByTagId($id);
            return VIEW_PATH . DS . App::getRoutes()->getController() . DS . 'pages.php';
        }
    }
}