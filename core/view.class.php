<?php

class View{

    protected $path;

    protected $data;

    protected static function getDefaultViewPath(){
        $router=App::getRoutes();
       // $admin=$router->getMethodPrefix();//admin_
        if (!$router){
            throw new Exception('Not found router');
        }
        $controller_dir=$router->getController();
        $template_name=$router->getMethodPrefix().$router->getAction().'.php';
        return VIEW_PATH.DS.$controller_dir.DS.$template_name;
    }

    public function __construct($data=array(),$path=null)
    {
        if(!$path){
            $path=self::getDefaultViewPath();
        }
        if (!file_exists($path)){
            throw new Exception("Path: $path not found; ");
        }
        $this->data=$data;
        $this->path=$path;
    }

    public function render(){
        $data=$this->data;
        ob_start();
        include VIEW_PATH.DS.'header.php';
        include ($this->path);
        include VIEW_PATH.DS.'footer.php';
        $content=ob_get_clean();
        return $content;
    }

}