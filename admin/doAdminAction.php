<?php ;
require_once "../include.php";
$act = $_REQUEST['act'];
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$mes = "";
if ($act == "logout") {
    logout();
} elseif ($act == "addAdmin") {
    $mes = addAdmin(connect());
} elseif ($act == "editAdmin") {
    $mes = editAdmin(connect(), $id);
} elseif ($act == "delAdmin") {
    $mes = delAdmin(connect(), $id);
} elseif ($act == "addCate") {
    $mes = addCate(connect());
} elseif ($act == "editCate") {
    $where = "id={$id}";
    $mes = editCate(connect(), $where);
} elseif ($act == "delCate") {
    $mes = delCate(connect(), $id);
} elseif ($act == "addPro") {
    $mes = addPro(connect());
} elseif ($act == "editPro") {
    $where = "id={$id}";
    $mes = editPro(connect(), $id);
} elseif ($act == "delPro") {
    $mes = delPro(connect(), $id);
} elseif ($act == "addUser") {
    $mes = addUser(connect());
} elseif ($act == "delUser") {
    $mes = delUser(connect(), $id);
} elseif ($act = "editUser") {
    $mes = editUser(connect(), $id);
} else {
    alertMessage("非法参数", 'index.php');
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if ($mes) {
    echo $mes;
}

?>
</body>
</html>

