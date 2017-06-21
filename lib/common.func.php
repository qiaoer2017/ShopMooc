<?php
function alertMessage($message, $url = '')
{
    if ($url == '') {
        echo "<script>alert('{$message}');</script>";
    }
    echo "<script>alert('{$message}');window.location='{$url}';</script>";
}