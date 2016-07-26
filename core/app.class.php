<?php

class App
{

    protected static $routes;

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function run($uri)
    {
        self::$routes = new Router($uri);
        $class_name = ucfirst(self::$routes->getController()) . 'Controller';
        $method_name = strtolower(self::$routes->getMethodPrefix() . self::$routes->getAction());
//        echo $class_name."<br>";
//        echo $method_name;
        $controller_object = new $class_name();
        if (method_exists($controller_object, $method_name)) {
            $view_path = $controller_object->$method_name();  //запись данных в обьект класса + если метод ничего не возвращает- то пустота
            $view_object= new View($controller_object->getData(),$view_path);
           //иклуд файла и передача в его инфы
            $content=$view_object->render();
        }else{
            throw new Exception('there is no '.$method_name.' in controller :'. $class_name);
        }
         $layout_path=VIEW_PATH.DS.'default.html';
        //var_dump(compact('content'));//--возвращает все из переменной 'content',результат будет строка        
         $layout_view_object=new View(compact('content'),$layout_path);
         echo $layout_view_object->render();
    }
}