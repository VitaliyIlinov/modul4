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
        if (isset($params)) {
            $id = $params[0];
            $this->data = $this->model->getNewsListById($id);
        } else {
            $this->data = $this->model->getList();
        }
    }

    public function admin_list()
    {
        $this->data['test_content'] = 'Тут будет список страниц Админа NewsController method admin_list';
    }

}