<?php

class CommentatorController extends Controller{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Comments();
    }

    public function show(){
        $params = App::getRoutes()->getParams();
        $page=0;
        if(isset($_GET['pages'])){
            $page=$_GET['pages']-1;
        }
        if (isset($params)) {
            $id = $params[0];
//            var_dump($id);
//            echo $page;
            //exit;
            $this->data = $this->model->getCommentsByUser($id,$page);
        }
    }

}