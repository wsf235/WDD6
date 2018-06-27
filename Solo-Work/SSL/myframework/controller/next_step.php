<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 10/29/17
 * Time: 9:32 AM
 */

class next_step extends app_controller{

    public function __construct($parent)
    {
        $this->parent = $parent;
        $nav = $this->get_nav();

        /*
                $this->get_view("header", array("pagename"=>"welcome"));
                $this->get_view("welcome");
                $this->get_view("navigation", $nav);

                if(!isset($_REQUEST["page"])){
                    $this->get_view("first");
                }
                elseif($_REQUEST["page"]==1){
                    $this->get_view("first");
                }
                elseif($_REQUEST["page"]==2){
                    $this->get_view("second");
                }
                elseif($_REQUEST["page"]==3){
                    $this->get_view("final");
                }
                else{
                    $this->get_view("first");
                }

                $this->get_view("footer");*/

    }

    public function index(){
        $nav = $this->get_nav();


        $this->get_view("header");
        //$this->get_view("welcome");
        $this->get_view("navigation", $nav);

        if(@$_SESSION["logged_in"] && $_SESSION["logged_in"] == 1){
            $this->get_view("home");
            if(!isset($_REQUEST["page"])){
                $this->get_view("first");
            }
            elseif($_REQUEST["page"]==1){
                $this->get_view("first");
            }
            elseif($_REQUEST["page"]==2){
                $this->get_view("second");
            }
            elseif($_REQUEST["page"]==3){
                $this->get_view("final");
            }
            else{
                $this->get_view("first");
            }
        }else{
            $this->get_view("home");
        }

        $this->get_view("footer");
    }

    public function contact(){
        $nav = $this->get_nav();

        $this->get_view("header", array("pagename"=>"contact"));

        $random = substr( md5(rand()), 0, 7);

        $this->get_view("contact",array("cap"=>$random));
        $this->get_view("navigation", $nav);
        $this->get_view("form");
    }

    public function contact_received(){
        $nav = $this->get_nav();

        $this->get_view("header");
        $this->get_view("navigation", $nav);
        //$this->get_view("form");


        if($_POST["captcha"]==$_SESSION["captcha"]){


            $_SESSION["email"] = $_POST["email"];
            $_SESSION["pass"] = $_POST["pass"];
            $_SESSION["statement"] = $_POST["statement"];
            $this->parent->get_model("users")->add("INSERT INTO `users`(`email`, `password`, `statement`) VALUES(:email, :pass, :statement)", array(":email"=>$_SESSION["email"], ":pass"=>sha1($_SESSION["pass"]), ":statement"=>$_SESSION["statement"]));

            var_dump($_POST);
            if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST["email"])){
                echo "No special characters";
            }
            elseif(!preg_match("/^[a-zA-Z0-9]*$/", $_POST["pass"])){
                echo "No special characters";
            }
            elseif(!preg_match("/^[a-zA-Z0-9]*$/", $_POST["statement"])){
                echo "No special characters";
            }
            else{

                header("Location:/next_step?msg=Success");
                //$this->get_view("success", $_POST);
            }

        }else{
            $random = substr( md5(rand()), 0, 7);
            $this->get_view("form");
            echo "Invalid captcha, try again";

            //echo "<br><a href='/next_step/contact'>Click here to go back</a>";

        }

    }

    public function add_action(){
        $this->parent->get_model("users")->add("INSERT INTO `users`(`email`, `password`, `statement`) VALUES(:email, :pass, :statement)", array(":email"=>$_REQUEST["email"], ":pass"=>sha1($_REQUEST["pass"]), ":statement"=>$_REQUEST["statement"]));

        header("Location:/next_step");
    }


    public function success()
    {
        $nav = $this->get_nav();

        $this->get_view("header");
        $this->get_view("navigation", $nav);
        $this->get_view("success", $_POST);
        $this->get_view("footer");

    }


    public function ajax_par(){
        $this->get_view("ajax_par", $_REQUEST);

    }




}


