<?php ;
require_once "../include.php";
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
if ($act == "logout") {
    logout();
} elseif ($act == "addAdmin") {
    $mes = addAdmin(connect());
} elseif ($act == "editAdmin") {
    $mes = editAdmin(connect(), $id);
} elseif ($act == "delAdmin") {
    $mes = delAdmin(connect(), $id);
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

