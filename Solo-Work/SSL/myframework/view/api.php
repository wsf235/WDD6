
<div class="container">
    <p>Search for books using the Google Book API</p><br /><br />

    <div class="starter-template">
        <?php
            foreach($data as $item){
                echo $item["volumeInfo"]["title"]." <br /> \n";
            }
        ?>
    </div>
</div>
