<?php
require_once "../include.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$row = getCateById(connect(), $id);
//var_dump($row);
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>修改分类</title>
</head>
<body>
<h3>修改分类</h3>
<form action="doAdminAction.php?act=editCate&id=<?= $row['id'] ?>" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">旧的分类名称</td>
            <td><input type="text" value="<?= $row['cName'] ?>" disabled/></td>
        </tr>
        <tr>
            <td align="right">新的分类名称</td>
            <td><input type="text" name="cName" placeholder="请输入新的分类名称"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="修改分类"/></td>
        </tr>
    </table>
</form>
</body>
</html>