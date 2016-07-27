<?php

class NewsController extends Controller{

    public function __construct($data=array())
    {
        parent::__construct($data);
        $this->model= new Newss();
        //var_dump($this->model->getList());
    }

    public function list(){
        //echo 'NewsController method list';
        //$this->data['content']='NewsController method list ';
        $this->data['content']=$this->model->getList();

        $params=App::getRoutes()->getParams();
        if(isset($params)){
  //          $id=$params[0];
//            echo ' this id '.$id;
        }
    }
    public function admin_list(){
        //echo 'Тут будет список страниц Админа NewsController method admin_list';
        $this->data['test_content']='Тут будет список страниц Админа NewsController method admin_list';
    }

}