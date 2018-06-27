<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/1/17
 * Time: 10:44 PM
 */



?>

<form method="post" action="/next_step/contact_received">
        <div class="form-group">
            <label for="user">Email</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" name="check" class="form-check-input" required>
                Are you the creator of this account?
            </label>
        </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Anything else we should know about you?</label>
        <textarea class="form-control" name="statement" id="statement" rows="3"></textarea>
    </div>
    <div class="form-group">

        <label for="exampleInputEmail1">Enter Captcha </label>

        <input name="captcha" type="captcha" id="captcha"  placeholder=""><br />
        <img src='/assets/image1.png'>

    </div>
        <button type="submit" id="normal" class="btn btn-primary">Submit</button>
        <input type="button" id="ajax" class="btn btn-primary" value="AJAX Submit">
</form>
