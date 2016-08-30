<?php

class Controller{

    protected $data;

    protected $model;

    protected $params;

    public function getData()
    {
        $promotion=new Model();
        $id=isset($_POST['promotion_id']) ? $_POST['promotion_id']  : null;
        $this->data['promotion']=$promotion->getPromotion($id);
        return $this->data;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function __construct($data=array())
    {
        $this->data=$data;
        $this->params=App::getRoutes()->getParams();
    }


}