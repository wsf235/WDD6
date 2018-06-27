<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/10/17
 * Time: 11:23 PM
 */

?>


<div class="container">
    <h1>Delete a fruit</h1>
    <p>Are you sure you want to delete that from the table?</p>

    <form action="/about/delete_action?id=<?php echo $_GET['id']?>" method="post">
        <input type="submit" value="Yes, Delete"/>
    </form>
</div>
