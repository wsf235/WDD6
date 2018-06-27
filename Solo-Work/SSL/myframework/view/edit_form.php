<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/10/17
 * Time: 11:10 PM
 */

?>




<div class="container">
    <h1>Edit a fruit</h1>
    <form action="/about/edit_action?id=<?php echo $_GET['id']?>" method="post">
        <input type="text" name="name" value="<? echo $_GET['name']?>" />
        <input type="submit" />
    </form>
</div>


