<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/14/17
 * Time: 5:15 PM
 */


require_once './google-api-php-client/src/Google/autoload.php';

class blogger extends app_controller{

    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    public function show_api(){
        $this->get_view("header");
        $nav = $this->get_nav();
        $this->get_view("navigation", $nav);

        /*
         * Step 5: send in the ID number and get back the data from the API
         * Step 6: pass the data into the blog view
         * */

        $data = $this->parent->get_model("blogger_model")->google_blog("5163931310689659726");
        $this->get_view("blog", $data);
        $this->get_view("blog_search");
        $this->get_view("footer");
    }

}