<?php
class AjaxController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Comments();
    }

    public function list()
    {
        if (isset($_POST['id_comment']) && isset($_POST['id_news']) && isset($_POST['type'])) {
            
            $id_comment = $_POST['id_comment'];
            $id_news = $_POST['id_news'];
            $type = $_POST['type'];
//            $this->model->cnt_like($id_comment, $type);
            $this->model->vote($id_comment, $type);
        }
    }
}