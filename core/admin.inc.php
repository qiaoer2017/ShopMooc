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

function addAdmin($link)
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if ((insert($link, "mooc_admin", $arr))) {
        $mes = "添加成功<br /> <a href='addAdmin.php'> 继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    } else {
        $mes = "添加失败<br /><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

function getAllAdmin($link)
{

    $sql = "SELECT `id`, `username`, `email` FROM `mooc_admin`";
    $rows = fetchAll($link, $sql);
    return $rows;
}

function editAdmin($link, $id)
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if (update($link, "mooc_admin", $arr, "id={$id}")) {
        $mes = "编辑成功！<a href='listAdmin.php'>产看管理员列表</a>";
    } else {
        $mes = "编辑失败！<a href='listAdmin.php'>重新编辑</a>";
    }
    return $mes;
}

function delAdmin($link, $id)
{
    if (delete($link, "mooc_admin", "id={$id}")) {
        $mes = "删除成功！<a href='listAdmin.php'>查看管理员列表</a>";
    } else {
        $mes = "删除失败！<a href='listAdmin.php'>重新删除</a>";
    }
    return $mes;
}