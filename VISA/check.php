<?php

   require_once './secureimage/securimage.php';
    $image = new Securimage();
    if ($image->check($_POST['ct_captcha']) != true)
    echo '-1';
?>