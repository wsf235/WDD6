<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/14/17
 * Time: 5:16 PM
 */

?>


<div class="container">
    <p>My Blog from Blogger API</p><br /><br />

    <div class="starter-template">
        <?php
        /*
         * Step 7: loop through each part of the response from the API
         * Step 8: Do stuff with it
         * Step 9: ?????
         * Step 10: Profit!
         * */
        foreach($data as $item){
            echo json_encode($item)."<br />";
            echo "<a href='".$item->url . "'>".$item->getContent()."</a> <br /> \n";
            echo "<p>By: ".$item->author->displayName."</p>";
            echo "<p>Comments: ".$item->replies->totalItems."</p>";
            if($item->replies->totalItems > 0){
                echo "<a href='".$item->replies->selfLink."'>Link to comments</a>";
            }
        }
        //echo $data;
        ?>
    </div>
</div>
