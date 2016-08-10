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
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }
        $page = !isset($page) ? 0 : $page;
        $this->data = $this->model->getNewsListByPage($page, 10);
        if (isset($params)&& !isset($_GET['pages'])) {
            $id = $params[0];
            $this->data = $this->model->getNewsListById($id);
        }
    }

    public function tag()
    {
        $params = App::getRoutes()->getParams();
        if (isset($params)) {
            $id = $params[0];
            $this->data = $this->model->getNewsListByTagId($id);
        }else{
            $this->data=$this->model->getTagsList();
        }
    }
}