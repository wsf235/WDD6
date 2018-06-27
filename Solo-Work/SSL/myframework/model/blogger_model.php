<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/14/17
 * Time: 5:13 PM
 */


class blogger_model{

    public function __construct($parent){
        //$this->db = $parent->db;
    }

    public function google_blog($id=''){

        /*
         * Step 1: create a new client
         * Step 2: set the API developer key
         * Step 3: create the blogger service
         * Step 4: get the list of posts from my blog via my blogger id (entering a different ID can access different blogs)
         *
         * */

        //$email = "wsf235@gmail.com";
        //$key = file_get_contents("./client_secret_961394487213-4v4f86dmmh8lmnr7jmko3cn88fat4e07.apps.googleusercontent.com.json");
        //$scopes = "https://www.googleapis.com/auth/blogger";
        $client = new Google_Client();
        $client->setApplicationName("API blogger key");
        $client->setDeveloperKey("AIzaSyB1r5eknUYqY8xTgNnr3pdRRsgBt_Gfwp0");
        //$client->setClientId("961394487213-4v4f86dmmh8lmnr7jmko3cn88fat4e07");
        //$client->setClientSecret("7VQUW7On9TcJyAfOWFD6Ww6d");
        //$client->setAuthConfigFile("./client_secret_961394487213-4v4f86dmmh8lmnr7jmko3cn88fat4e07.apps.googleusercontent.com.json");
        //$cred = new Google_Auth_AssertionCredentials($email, array($scopes), $key);
        //$client->setAssertionCredentials($cred);

        //$client->getAccessToken();

        //$client->refreshToken("https://accounts.google.com/o/oauth2/token");


        $service = new Google_Service_Blogger($client);

        $result = $service->posts->listPosts($id); //users->get($id)->getBlogs();
        //Google_Service_Blogger_Comment
        //echo $service->comments->listComments($id)->count();

        return $result;
    }

    public function google_comments($id, $post){
        $client = new Google_Client();
        $client->setApplicationName("API blogger key");
        $client->setDeveloperKey("AIzaSyB1r5eknUYqY8xTgNnr3pdRRsgBt_Gfwp0");

        $service = new Google_Service_Blogger_Comment($client);
        $result = $service->content;

        return $result;
    }

}