<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 10/29/17
 * Time: 9:12 AM
 */


class app_controller{
    public function __construct($url_path_parts, $config)
    {
        $this->db = new PDO("mysql:dbname=".$config["dbname"].";",$config["dbuser"], $config["dbpass"]);


        $this->url_path_parts = $url_path_parts;

        if($url_path_parts[0]){
            include './controller/'.$url_path_parts[0].".php";
            $appcon = new $url_path_parts[0]($this);

            // http://127.0.0.1/welcome
            if(isset($url_path_parts[1])){
                $appcon->$url_path_parts[1]();
            }else{
                $method_var = array($appcon, 'index');
                if(is_callable($method_var, false, $callable_method)){
                    $appcon->index($this);
                }
            }
        }
        else{
            include './controller/'.$config["default_controller"].".php";
            $appcon = new $config["default_controller"]($this);
            if(isset($url_path_parts[1])){
                $appcon->config["default_controller"][1]();
            }else{
                $method_var = array($appcon, 'index');
                if(is_callable($method_var, false, $callable_method)){
                    $appcon->index($this);
                }
            }
        }
    }


    public function get_view($page, $data=array()){
        require_once './view/'.$page.".php";
    }

    public function get_model($page){
        require_once './model/'.$page.".php";
        $model = new $page($this);
        return $model;
    }

    public function get_nav(){
        return array(
            "page1"=>"Home",
            "page2"=>"Contact",
            "page3"=>"Profile",
            "page4"=>"About",
            "page5"=>"Books API",
            "page6"=>"Blogger API"
        );
    }
}


?>