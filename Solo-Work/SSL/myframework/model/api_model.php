<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/13/17
 * Time: 12:28 AM
 */


class api_model{

    public function __construct($parent){
        //$this->db = $parent->db;
    }

    public function google_books($term=''){
        $client = new Google_Client();
        $client->setApplicationName("API book key");
        $client->setDeveloperKey("AIzaSyBjBmhc2bh8IDlz_AQebPXlwWIwpRJoILA");

        $service = new Google_Service_Books($client);



        $opt_params = array("filter"=>"free-ebooks");
        $result = $service->volumes->listVolumes($term, $opt_params);

        return $result;
    }

}