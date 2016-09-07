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
    public function admin_tag()
    {
        $this->data['tags'] = $this->model->getTagsList();
    }
    public function admin_addtag()
    {
        if(isset($_POST['tag_name'])&& !empty($_POST['tag_name'])){
            $tag_name=$_POST['tag_name'];
             $result=$this->model->admin_add_tag($tag_name);
            if($result){
                Router::redirect('/admin/news/tag');
            }
        }
    }

    public function admin_add()
    {

        $this->data['tags'] = $this->model->getTagsList();
        $this->data['category'] = $this->model->getCategoryList();
        if ($_POST) {
            if (!empty($_FILES['photo']['name'])) {
                $img = $this->model->move_uploaded_file($_FILES);
            }
            $img = isset($img) ? $img : null;
            $_result = $this->model->save($_POST, $img);
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
            if (!empty($_FILES['photo']['name'])) {
                $img = $this->model->move_uploaded_file($_FILES);
                // echo "<pre>";print_r($_FILES);print_r($_POST);exit;
            }
            $img = isset($img) ? $img : null;

            $result = $this->model->save($_POST, $img, $id);

            if ($result) {
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/index/list');
        }

        if (isset($this->params[0])) {
            $this->data = $this->model->getNewsListById($this->params[0]);
            $this->data['category'] = $this->model->getCategoryList();
            $this->data['tags_list'] = $this->model->getTagsList();

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
        Router::redirect('/admin/index/list');
    }

    public function admin_list()
    {
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }
        $page = !isset($page) ? 0 : $page;
        $this->data = $this->model->getNewsListByPage($page, 10);
    }

}