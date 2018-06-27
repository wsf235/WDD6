



<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="/next_step">Hello World!</a>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:<?php echo $_REQUEST["page"]*33 ?>" aria-valuenow=<?php echo rand(1, 100); ?> aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            /**
             * Created by PhpStorm.
             * User: MasterAnseen
             * Date: 10/29/17
             * Time: 12:49 PM
             */

            echo '<li class="nav-item active"><a class="nav-link" href="/next_step" ><button>'.$data["page1"].'</button></a></li>';
            if(@$_SESSION["logged_in"] && $_SESSION["logged_in"] == 1){
                echo '<li class="nav-item"><a class="nav-link" href="/profile" ><button>' . $data["page3"] . '</button></a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/about" ><button>'.$data["page4"].'</button></a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/api/show_api" ><button>'.$data["page5"].'</button></a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/blogger/show_api" ><button>'.$data["page6"].'</button></a></li>';

            }else {
                echo '<li class="nav-item"><a class="nav-link" href="/next_step/contact" ><button>'.$data["page2"].'</button></a></li>';

            }?>
        </ul>
        <span style="color: red"><?=@$_REQUEST['msg']?$_REQUEST['msg']:'';?></span>
        <?if(@$_SESSION["logged_in"] && $_SESSION["logged_in"] == 1){?>
            <form class="navbar-form navbar-right">
                <a href="/profile">Profile</a> |
                <a href="/auth/logout">Logout</a>
            </form>
        <?}else{?>
            <form class="navbar-form navbar-right" role="search" method="post" action="/auth/login">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="password" placeholder="Password" />
                </div>
                <button type="submit" class="btn btn-default">Sign In</button>
            </form>
        <?}?>
    </div>
</nav>
