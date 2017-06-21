<?php
function checkAdmin($link, $sql)
{
    return fetchOne($link, $sql);
}

function checkLogined()
{
    if (!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
        alertMessage("您还未登陆", "login.php");
    }
}

function logout()
{
    $_SESSION = [];
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time() - 1);
    }
    if (isset($_COOKIE['adminId'])) {
        setcookie('adminId', "", time() - 1);
    }
    if (isset($_COOKIE['adminName'])) {
        setcookie('adminName', "", time() - 1);
    }
    session_destroy();
    alertMessage("退出成功", 'login.php');
}