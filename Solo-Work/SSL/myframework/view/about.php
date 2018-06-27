
<div class="container">
    <a href="/about/add_form">Add more fruit!</a><br />

<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/9/17
 * Time: 12:54 PM
 */

foreach ($data as $fruit){
    echo $fruit["name"]."<a href='/about/edit_form?name=".$fruit["name"]."&id=".$fruit["id"]."'> Edit </a><a href='/about/delete_form?id=".$fruit["id"]."'> Delete </a><br />";
}
?></div>