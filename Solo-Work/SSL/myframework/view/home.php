<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/5/17
 * Time: 9:45 PM
 */

?>



<?if(@$_SESSION["logged_in"] && $_SESSION["logged_in"] == 1){
    echo '<h1>Welcome back '.$_SESSION["email"].'!</h1>';
}else{?>
    <h1>Welcome to the index page!</h1>
    <h2>Click contact to sign up and then proceed to sign in in the navbar!</h2>
<?}?>