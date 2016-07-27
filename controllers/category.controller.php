<?php
class CategoryController extends Controller{
    public function __construct($data=array())
    {
        parent::__construct($data);
        $this->model= new Newss();
    }
    public function list(){
        $params=App::getRoutes()->getParams();
        if(isset($params)){
            $id=$params[0];
            $this->data=$this->model->getCategoryById($id);
        }else {
            $this->data = $this->model->getCategoryList();
        }
    }
    public function admin_list(){
        $this->data['test_content']='Тут будет список страниц Админа NewsController method admin_list';
    }
}