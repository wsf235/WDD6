<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 10/28/17
 * Time: 11:51 PM
 */

include 'app_controller.php';

class App{
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function start_app($params){
        $app_controller = new app_controller($params, $this->config);
    }
}



?>