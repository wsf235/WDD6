<?php
/**
 * Created by PhpStorm.
 * User: MasterAnseen
 * Date: 11/1/17
 * Time: 10:36 PM
 */


function create_image($cap)

{

    unlink("./assets/image1.png");

    global $image;

    $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");

    $background_color = imagecolorallocate($image, 255, 255, 255);

    $text_color = imagecolorallocate($image, 0, 255, 255);

    $line_color = imagecolorallocate($image, 64, 64, 64);

    $pixel_color = imagecolorallocate($image, 0, 0, 255);

    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

    for ($i = 0; $i < 3; $i++) {

        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);

    }

    for ($i = 0; $i < 1000; $i++) {

        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);

    }

    $text_color = imagecolorallocate($image, 0, 0, 0);

    ImageString($image, 22, 30, 22, $cap, $text_color);

    imagepng($image, "./assets/image1.png");
    $_SESSION["captcha"] = $cap;
}

create_image($data["cap"]);


?>

