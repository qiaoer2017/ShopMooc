<?php
function reg($link)
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    $arr['regTime'] = time();
    $uploadFile = uploadFile();

    //print_r($uploadFile);
    if ($uploadFile && is_array($uploadFile)) {
        $arr['face'] = $uploadFile[0]['name'];
    } else {
        return "注册失败";
    }
//	print_r($arr);exit;
    if (insert($link, "mooc_user", $arr)) {
        $mes = "注册成功!<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=login.php'/>";
    } else {
        $filename = "uploads/" . $uploadFile[0]['name'];
        if (file_exists($filename)) {
            unlink($filename);
        }
        $mes = "注册失败!<br/><a href='reg.php'>重新注册</a>|<a href='index.php'>查看首页</a>";
    }
    return $mes;
}

function login($link)
{
    $username = $_POST['username'];
    //addslashes():使用反斜线引用特殊字符
    //$username=addslashes($username);
    $username = mysqli_escape_string($link, $username);
    $password = md5($_POST['password']);
    $sql = "select * from mooc_user where username='{$username}' and password='{$password}'";
    //$resNum=getResultNum($sql);
    $row = fetchOne($link, $sql);
    //echo $resNum;
    if ($row) {
        $_SESSION['loginFlag'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $mes = "登陆成功！<br/>3秒钟后跳转到首页<meta http-equiv='refresh' content='3;url=index.php'/>";
    } else {
        $mes = "登陆失败！<a href='login.php'>重新登陆</a>";
    }
    return $mes;
}

function userOut()
{
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time() - 1);
    }

    session_destroy();
    header("location:index.php");
}

/**
 * 添加用户的操作
 * @param int $id
 * @return string
 */
function addUser($link)
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    $arr['regTime'] = time();
    $uploadFile = uploadFile("../uploads");
    if ($uploadFile && is_array($uploadFile)) {
        $arr['face'] = $uploadFile[0]['name'];
    } else {
        return "添加失败<a href='addUser.php'>重新添加</a>";
    }
    if (insert($link, "mooc_user", $arr)) {
        $mes = "添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
    } else {
        $filename = "../uploads/" . $uploadFile[0]['name'];
        if (file_exists($filename)) {
            unlink($filename);
        }
        $mes = "添加失败!<br/><a href='addUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
    }
    return $mes;
}

function delUser($link, $id)
{
    $sql = "SELECT `face` FROM `mooc_user` WHERE id=$id";
    $row = fetchOne($link, $sql);
    $face = $row['face'];
    if (delete($link, "mooc_user", "id={$id}")) {
        if (file_exists("../uploads/" . $face)) {
            unlink("../uploads/" . $face);
        }
        $mes = "删除成功！<a href='listUser.php'>查看用户列表</a>";
    } else {
        $mes = "删除失败！<a href='listUser.php'>重新删除</a>";
    }
    return $mes;
}


function editUser($link, $id)
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if (update($link, "mooc_user", $arr, "id={$id}")) {
        $mes = "编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
    } else {
        $mes = "编辑失败!<br/><a href='listUser.php'>请重新修改</a>";
    }
    return $mes;
}