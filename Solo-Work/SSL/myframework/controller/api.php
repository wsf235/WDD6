<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/13/17
 * Time: 2:13 PM
 */

require_once './google-api-php-client/src/Google/autoload.php';

class api extends app_controller{

    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    public function show_api(){
        $this->get_view("header");
        $nav = $this->get_nav();
        $this->get_view("navigation", $nav);
        $data = $this->parent->get_model("api_model")->google_books("Henry David Thoreau");
        $this->get_view("api", $data);
        $this->get_view("book_search");
        $this->get_view("footer");
    }

    public function search(){
        $this->get_view("header");
        $nav = $this->get_nav();
        $this->get_view("navigation", $nav);
        $data = $this->parent->get_model("api_model")->google_books($_REQUEST['search_item']);
        $this->get_view("api", $data);
        $this->get_view("book_search");
        $this->get_view("footer");
    }

}