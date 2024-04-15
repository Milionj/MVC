<?php class Controller
{

    public function model($model)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        }
        else {
            die('Model not found');
        }
        
    }

    public function render($view, $data = [])
    {

        $calledClass = get_called_class();
        $controllerName = strtolower($calledClass);
        if (file_exists('../app/views/' . $controllerName . '/' . $view . '.php')) {
            
            require_once '../app/views/' . $controllerName . '/' . $view . '.php';
        }
        else {
            die('View not found');
        }

    }
}
