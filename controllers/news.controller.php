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
        $this->data['news'] = $this->model->getNewsListByPage($page, 10);
        if (isset($params)&& !isset($_GET['pages'])) {
            $id = $params[0];
            $this->data = $this->model->getNewsListById($id);
            $this->model=new Comments();
            $this->data['comments']=$this->model->get_comments($id);
//            if(isset($_POST['submit'])&& isset($_POST['comment']) && !empty($_POST['comment'])){
            if( isset($_POST['comment']) && !empty($_POST['comment'])){
                $this->data['comments']=$this->model->add_comment(Session::get('login'),$id,$_POST['comment'],$_POST['id_parent']);
                Router::redirect("/news/list/{$id}");
            }
        }

    }

    public function tag()
    {
        $params = App::getRoutes()->getParams();
        if (isset($params)) {
            $id = $params[0];
            $this->data['tags'] = $this->model->getNewsListByTagId($id);
        }else{
            $this->data['tags'] =$this->model->getTagsList();
        }
    }
}