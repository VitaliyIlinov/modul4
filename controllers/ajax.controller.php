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
        if(isset($_POST['id_comment'])&& isset($_POST['comment']) && !empty($_POST['comment'])){
            $this->model->change_comment($_POST['comment'],$_POST['id_comment']);
        }
        if( isset($_POST['comment']) && !empty($_POST['comment'])){
            $id_comment=$this->data['comments']=$this->model->add_comment(Session::get('login'),$_POST['id_news'],$_POST['comment'],$_POST['id_parent']);

//            $result=$this->data['comments']=$this->model->get_comments($_POST['id_news']);
            $result=$this->data=$this->model->getCommentById($id_comment);

//            echo "<pre>";
//            print_r($result);
//            echo "</pre>";
           // echo json_encode(array('first'=>'some value','second'=>'some value 2'));
            echo json_encode($result[0]);
            exit;
            return VIEW_PATH.DS.'news'.DS.'list.php';
        }
    }
}