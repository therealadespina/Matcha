<?php
class Route {
    static function init()
    {
        $controller_name = 'Main';
        //главная страница
        $action_name = 'index';
    
        $request_uri = explode('?', $_SERVER['REQUEST_URI'])[0]; //Разбиваю строку с помощью разделителя
        $request_uri = explode('/', $request_uri);

        if (!empty($request_uri[1]))
        {
            $controller_name = $request_uri[1];
        }
        if (!empty($request_uri[2]))
        {
            $action_name = $request_uri[2];
        }
        // префексы
        $model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;
        
        $model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}
		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}
	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}