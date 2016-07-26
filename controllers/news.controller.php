<?php

class NewsController extends Controller{
    
    public function list(){
        //echo 'NewsController method list';
        $this->data['content']='NewsController method list ';

        $params=App::getRoutes()->getParams();
        if(isset($params[0])){
            $id=$params[0];
            echo ' this id '.$id;
        }
    }
    public function admin_list(){
        //echo 'Тут будет список страниц Админа NewsController method admin_list';
        $this->data['test_content']='Тут будет список страниц Админа NewsController method admin_list';
    }

}