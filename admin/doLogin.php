<?php
require_once "../include.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$trueVerify = $_SESSION['verify'];


$autoFlag = isset($_POST['autoFlag']) ? $_POST['autoFlag'] : 0;

if ($verify == $trueVerify) {
    $link = connect();
    $sql = "SELECT * FROM `mooc_admin` WHERE username='$username' AND password='$password'";
    $admin = checkAdmin($link, $sql);
    if ($admin) {
        if ($autoFlag) {
            setcookie("adminId", $admin['id'], time() + 7 * 24 * 3600);
            setcookie("adminName", $admin['username'], time() + 7 * 24 * 3600);
        }

        $_SESSION['adminName'] = $admin['username'];
        $_SESSION['adminId'] = $admin['id'];
        header("location:index.php");
    } else {
        alertMessage("用户名或密码错误", "login.php");
    }
} else {
    alertMessage("验证码错误", "login.php");
}

