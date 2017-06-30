<?php
/*$link = connect();
$sql = "SELECT * from `mooc_admin`";
$totalRows = getResultNum($link, $sql);
$pageSize = 2;
$totalPage = ceil($totalRows / $pageSize);
$page = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
if ($page < 1 || $page == null || !is_numeric($page)) {
    $page = 1;
}
if ($page >= $totalPage) {
    $page = $totalPage;
}
$offset = ($page - 1) * $pageSize;
unset($sql);
$sql = "SELECT * FROM mooc_admin LIMIT {$offset},{$pageSize}";
$rows = fetchAll($link, $sql);
foreach ($rows as $row) {
    echo "编号：" . $row['id'] . "<br />";
    echo "管理员的名称：" . $row['username'] . "<br />";
}*/

function showPage($page, $totalPage, $where = null, $sep = "&nbsp;")
{
    $where = ($where == null) ? null : "&" . $where;
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page=" . ($page - 1) . "{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page=" . ($page + 1) . "{$where}'>下一页</a>";
    $str = "{$page}页/{$totalPage}页";
    $p = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $p .= "[{$i}]{$sep}";
        } else {
            $p .= "<a href='{$url}?page={$i}{$where}'>{$i}</a>{$sep}";
        }
    }
    return $str . "<br>" . $index . $sep . $prev . $sep . $p . $sep . $next . $sep . $last;
}

