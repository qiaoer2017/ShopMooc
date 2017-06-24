<?php
require_once "../include.php";
$link = connect();
$pageSize = 4;
$page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric(($page))) {
    $page = 1;
}
$sql = "SELECT * from `mooc_admin`";
$totalRows = getResultNum($link, $sql);
$totalPage = ceil($totalRows / $pageSize);
if ($page >= $totalPage) {
    $page = $totalPage;
}
$offset = ($page - 1) * $pageSize;
$sql = "SELECT id,username,email FROM `mooc_admin` LIMIT {$offset},{$pageSize}";
$rows = fetchAll($link, $sql);


//$rows = getAllAdmin(connect());
if (!$rows) {
    alertMessage("没有管理员，请先添加", "addAdmin.php");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>-.-</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addAdmin()">
        </div>

    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="15%">编号</th>
            <th width="25%">管理员名称</th>
            <th width="30%">管理员邮箱</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><input type="checkbox" id="c1" class="check"><label for="c1"
                                                                        class="label"><?= $row['id'] ?></label>
                </td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td align="center"><input type="button" value="修改" class="btn"
                                          onclick="editAdmin(<?php echo $row['id']; ?>)">
                    <input type="button" value="删除" class="btn" onclick="delAdmin(<?= $row['id'] ?>)"/>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if ($totalRows > $pageSize): ?>
            <tr>
                <td colspan="4"><?php echo showPage($page, $totalPage) ?></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">

    function addAdmin() {
        window.location = "addAdmin.php";
    }
    function editAdmin(id) {
        window.location = "editAdmin.php?id=" + id;
    }
    function delAdmin(id) {
        if (window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")) {
            window.location = "doAdminAction.php?act=delAdmin&id=" + id;
        }
    }
</script>
</body>
</html>