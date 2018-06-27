<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/5/17
 * Time: 8:53 PM
 */
//var_dump($_SESSION);
?>



<div class="row panel">
    <div class="col-md-12 col-xs-12">
        <img src="/assets/profilepic.jpg" class="img-thumbnail picture hidden-xs" /><br />
        <form action="/profile/update" method="post" enctype="multipart/form-data">
            <label class="btn btn-default btn-file" style="width: 110px;">Browse
                <input name="img" type="file" style="display: none;">
            </label>

            <input type="submit" value="Update!" class="btn btn-primary">
        </form>
        <div class="header">
            <h1><?php echo '<b>'.$_SESSION["email"].'</b><br />';?></h1>
            <h4>Web Dev</h4>
            <span><?php echo '<b>'.$_SESSION['statement'].'</b>';?></span>
        </div>
    </div>
</div>