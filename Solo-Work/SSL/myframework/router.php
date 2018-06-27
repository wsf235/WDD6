<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 10/28/17
 * Time: 6:21 PM
 */

include 'bin/app.php';

class router{
    public function __construct($url_path_parts, $config)
    {
        $this->App = new App($config);

        switch($url_path_parts[0]){
            case "home":
                $this->App->start_app($url_path_parts);
                break;
            case "api":
                $this->App->start_app($url_path_parts);
                break;
            default:
                $this->App->start_app($url_path_parts);
                break;

        }
    }
};


?>