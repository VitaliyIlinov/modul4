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
            $id = isset($_POST['id_news']) ? $_POST['id_news'] : null;
            $result = $this->model->save($_POST, $id);
//            if(isset($_POST['tags'])){
//                
//            }
            if ($result) {
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/index');
        }

        if (isset($this->params[0])) {
            $this->data= $this->model->getById($this->params[0]);
            $this->data['tags']=$this->model->getTagsList();
            $this->data['category']=$this->model->getCategoryList();
            $this->data['is_tags']=$this->model->is_tags($this->params[0]);

            //$this->data['il2_tags'][$this->data['is_tags'][0]['id_tag']]='';
            //$this->data['il2_tags'][$this->data['is_tags'][1]['id_tag']]='';


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