<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 10/28/17
 * Time: 6:18 PM
 */

$config = array(
    'default_controller' => 'next_step',
    'dbname' => 'fruits',
    'dbpass' => 'root',
    'dbuser' => 'root',
    'baseurl' => 'http://127.0.0.1'
);

$str = $config["baseurl"]."/".$_SERVER['REQUEST_URI'];

$url_paths_parts = explode('/', ltrim(parse_url($str, PHP_URL_PATH), '/'));

$file = fopen("./assets/login.txt", "r");

$n_file = stream_get_contents($file);

$login_text = explode('|', ltrim($n_file, '|'));

$login_text = str_replace(array("\r", "\n"), '', $login_text);

$max = sizeof($login_text);

$userbase = array();

for($i=0; $i < $max; $i+=3){
    $userbase[$login_text[$i]] = array($login_text[$i], $login_text[$i+1], $login_text[$i+2]);
}

$GLOBALS["userbase"] = $userbase;

//var_dump($userbase);
//var_dump($GLOBALS["user_list"]);
session_start();
$_SESSION["admin_email"] = "Orenglaive";
$_SESSION["admin_pass"] = "Levia";
$_SESSION["user"] = "Orenglaive";
//$_SESSION["statement"] = "The 18th King of Thear's great great great great great great great great great great great great great great great great grandfather!";

include './router.php';

$router = new router($url_paths_parts, $config);


?>