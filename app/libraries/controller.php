<?php

abstract class Controller{
    public function model(string $model){
        require_once(APPROOT . 'app/models/' . $model . '.php');
        return new $model();
    }

    public function views($vue, array $data = []){
        var_dump(APPROOT . 'app/views/' . strtolower(get_class($this)) . '/' . $vue . '.php');
        if(!empty($data)) 
            extract($data);
        ob_start();
        require_once(APPROOT . 'app/views/' . strtolower(get_class($this)) . '/' . $vue . '.php');
        $content = ob_get_clean();
        //require_once(ROOT . 'views/layout/default.php');
    }
}
