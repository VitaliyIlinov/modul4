<?php

class App
{

    protected static $routes;

    public static $db;

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function run($uri)
    {
        self::$db=new DB(Config::get('db.host'),Config::get('db.user'),Config::get('db.password'),
            Config::get('db.db_name'));
        self::$routes = new Router($uri);
        $class_name = ucfirst(self::$routes->getController()) . 'Controller';
        $method_name = strtolower(self::$routes->getMethodPrefix() . self::$routes->getAction());
       // echo $class_name."<br>";//indexController
        //echo $method_name;//admin_list
        $layout= self::$routes->getMethodPrefix();
        //echo $layout;
        if($layout =='admin_' && Session::get('role') =='admin'){
            if ($method_name!=='admin_login'){
                echo $method_name;
                Router::redirect('/admin/users/login');
            }
        }

        $controller_object = new $class_name();
        

        if (method_exists($controller_object, $method_name)) {
            $view_path = $controller_object->$method_name();  //запись данных в обьект класса + если метод ничего не возвращает- то пустота
            $view_object= new View($controller_object->getData(),$view_path);
           //иклуд файла и передача в его инфы
            $content=$view_object->render();
            echo $content;
        }else{
            throw new Exception('there is no Method : '.$method_name.' in controller :'. $class_name);
        }
    }
}