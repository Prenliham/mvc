<?php

class App{

    protected $controller = "home",
            $method = 'index',
            $params = [];

    public function __construct(){
        $url = $this->parseURL();

        // controller
        if(!empty($url)){
            if(file_exists("../app/controllers/" . $url[0] . ".php")){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once "../app/controllers/" . $this->controller . ".php";

        $this->controller = new $this->controller;
        
        // method
        if (isset($url[1])){
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        // params
        if(!empty($url)){
            $this->params = array_values($url);
        }


        // jalankan controller dan method, serta kirimkan params jika ada 
        call_user_func_array([$this->controller, $this->method], $this->params);
        

    }


    public function parseURL()
    {
        if(isset($_GET['url'])){

            // menghapus "/" di akhir url 
            $url = rtrim($_GET['url'], '/');

            // membersihkan url dari karakter yang tidak diinginkan
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // memecah url menjadi array berdasarkan "/"
            $url = explode('/', $url);

            return $url;
        }
    }

}