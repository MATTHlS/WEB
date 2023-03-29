<?php


class Core{
    protected $currentController = "page";
    protected $currentMethod="index";
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();
        echo "bonjour";
        $controller = ucfirst($url[0]);
        $this->currentController = new $controller();

        
        unset($url[0]);
        $this->currentMethod = $url[1];
        unset($url[1]);
        $this->params = $url?array_values($url):[];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        $url = $_GET['url'];
        $url = trim($url);
        return explode("/", $url);
    }
}

