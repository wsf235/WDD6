<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/9/17
 * Time: 12:50 PM
 */

class about extends app_controller
{

    public function __construct($parent)
    {
        $this->parent = $parent;
        $this->show_list();


        if (@$_SESSION["logged_in"] && $_SESSION["logged_in"] == 1) {

        } else {
            header("Location:/next_step");
        }



    }

    public function show_list(){
        $nav = $this->get_nav();
        $data = $this->parent->get_model("fruits")->select("select * from fruit_table");

        $this->get_view("header", array("pagename"=>"about"));
        $this->get_view("navigation", $nav);
        $this->get_view("about", $data);
    }

    public function add_form(){
        //$nav = $this->get_nav();

        //$this->get_view("header", array("pagename"=>"about"));
        //$this->get_view("navigation", $nav);
        $this->get_view("add_form");
        $this->get_view("footer");
    }

    public function add_action(){
        $this->parent->get_model("fruits")->add("insert into fruit_table (name) values(:name)", array(":name"=>$_REQUEST["name"]));

        header("Location:/about");
    }

    public function edit_form(){
        //$nav = $this->get_nav();
        $data = $this->parent->get_model("fruits")->select("select * from fruit_table");

        //var_dump($data[$_GET['id']-1]['name']);

        //$this->get_view("header", array("pagename"=>"about"));
        //$this->get_view("navigation", $nav);
        $this->get_view("edit_form", $data);
        $this->get_view("footer");
    }

    public function edit_action(){
        //$sql = "UPDATE `fruits`.`fruit_table` SET `name` = \'Honey\' WHERE `fruit_table`.`id` = 3;";
        //$this->parent->get_model("fruits")->update("update fruit_table set (name) = values(:name) where (id) = values(:id)", array(":name"=>$_REQUEST["name"], ":id"=>$_GET['id']));
        $this->parent->get_model("fruits")->update("UPDATE `fruits`.`fruit_table` SET  `name` = (:name) WHERE  `fruit_table`.`id` =(:id);", array(":name"=>$_REQUEST["name"], ":id"=>$_GET['id']));
        //var_dump($_GET['id']);
        //var_dump($_REQUEST["name"]);
        header("Location:/about");
    }

    public function delete_form(){
        //$nav = $this->get_nav();
        $data = $this->parent->get_model("fruits")->select("select * from fruit_table");

        //$this->get_view("header", array("pagename"=>"about"));
        //$this->get_view("navigation", $nav);
        $this->get_view("delete_form", $data);
        $this->get_view("footer");
    }

    public function delete_action(){
        $this->parent->get_model("fruits")->delete("DELETE FROM `fruits`.`fruit_table` WHERE `fruit_table`.`id` = (:id)", array(":id"=>$_GET['id']));
        //$this->parent->get_model("fruits")->delete("DELETE FROM `fruits`.`fruit_table` WHERE `fruit_table`.`id` = 19");
        header("Location:/about");
    }

}
