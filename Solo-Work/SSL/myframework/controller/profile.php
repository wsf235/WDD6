<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/3/17
 * Time: 12:02 AM
 */

class profile extends app_controller{

    public function __construct($parent)
    {
        $this->parent = $parent;
        if(@$_SESSION["logged_in"] && $_SESSION["logged_in"] == 1){

        }else{
            header("Location:/next_step");
        }

    }

    public function index(){
        $nav = $this->get_nav();
        $data = $this->parent->get_model("users")->select("SELECT * FROM `users` WHERE `email`=(:email)", array(":email"=>$_SESSION['email']));

        //var_dump($data);

        $this->get_view("header");
        $this->get_view("navigation", $nav);

        $this->get_view("profile", $data);

    }

    public function update(){
        if($_FILES["img"]["name"] != ""){

            $img_file = pathinfo("assets/".$_FILES["img"]["name"], PATHINFO_EXTENSION);

            if(file_exists("assets/".$_FILES["img"]["name"])){
                echo '<b>'.$_FILES["img"]["name"].' already exists</b>';
            }else{
                if($img_file != "jpg" && $img_file != "png"){
                    echo '<b>'.$img_file.' file types are not allowed</b>';
                }else{
                    if(move_uploaded_file($_FILES["img"]["tmp_name"], "assets/".$_FILES["img"]["name"])){
                        echo '<b>File Upload Complete</b>';
                    }else{
                        echo '<b>Upload Failed</b>';
                    }
                }
            }
        }
        header("Location:/profile?msg=File Uploaded");
    }

}


