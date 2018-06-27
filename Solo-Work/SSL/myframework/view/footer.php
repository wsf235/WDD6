<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 10/29/17
 * Time: 9:38 PM
 */?>


<!-- <script src="../assets/js/bootstrap.js"></script> -->



<footer>
    <p>footer stuff</p>
</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>

<script>
    $("#ajax").click(function(){
        alert(1);
        $.ajax({
            type: "POST",
            url: "/next_step/success",
            data: {"user": $("#email").val(), "pass": $("#pass").val(), "check": $("#check").val(), "text": $("#statement").val()},
            success: function(){

                location.href = "/next_step/success";
            },
            error: function(){
                alert("");
            }
        })
    });
</script>