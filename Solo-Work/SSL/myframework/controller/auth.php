<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/4/17
 * Time: 2:47 PM
 */

class auth extends app_controller{

    public function __construct($parent)
    {

        $this->parent = $parent;

    }

    //auth/login
    public function login(){

        if($_REQUEST['email'] && $_REQUEST["password"]){
            /*
            if(array_key_exists($_REQUEST['email'], $GLOBALS["userbase"])){
                if(in_array($_REQUEST['password'], $GLOBALS["userbase"][$_REQUEST['email']])) {
                    $_SESSION["logged_in"] = 1;
                    $_SESSION['current_user'] = $GLOBALS["userbase"][$_REQUEST['email']];
                    header("Location:/next_step");
                }else{
                    header("Location:/next_step?msg=Bad Login, password not found or incorrect.");
                }
            }else{
                header("Location:/next_step?msg=Bad Login, username not found or incorrect");
            }
            */

            $data = $this->parent->get_model("users")->select(
                "select * from users where email= :email and password= :password",
                array(":email"=>$_REQUEST['email'], ":password"=>sha1($_REQUEST['password']))
            );

            if($data){
                $_SESSION["logged_in"]=1;

                $_SESSION['id'] = $data[0]['id'];
                $_SESSION['email'] = $data[0]['email'];
                $_SESSION['password'] = $data[0]['password'];
                $_SESSION['statement'] = $data[0]['statement'];

                //var_dump($data);
                header("Location:/profile");
            }else{
                header("Location:/next_step?msg=Username or password not found");
            }

        }else{
            header("Location:/next_step?msg=Missing username or password");
        }
    }

    public function logout(){
        session_destroy();
        header("Location:/next_step");
    }


}


