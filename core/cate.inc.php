<?php
function addCate($link)
{
    $arr = $_POST;
    $mes = "";
    if (insert($link, "mooc_cate", $arr)) {
        $mes = "分类添加成功！<br /><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
    } else {
        $mes = "分类添加失败！<br /><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    return $mes;
}


function getCateById($link, $id)
{
    $sql = "SELECT `id`, `cName` FROM `mooc_cate` WHERE `id`={$id}";
    return fetchOne($link, $sql);
}

function editCate($link, $where)
{
    $arr = $_POST;
    if (update($link, "mooc_cate", $arr, $where)) {
        $mes = "分类修改成功！<br /><a href='listCate.php'>查看分类</a>";
    } else {
        $mes = "分类修改失败！<br /><a href='listCate.php'>重新修改</a>";
    }
    return $mes;
}

function delCate($link, $id)
{
    $res = checkProExist($link, $id);
    if (!$res) {
        $where = "id=$id";
        if (delete($link, "mooc_cate", $where)) {
            $mes = "分类删除成功！<br /><a href='listCate.php'>查看分类</a>";
        } else {
            $mes = "分类删除失败！<br /><a href='listCate.php'>重新操作</a>";
        }
        return $mes;
    } else {
        alertMessage("不能删除该分类，该分类下有产品！", "listPro.php");
    }
}

/**
 * 得到所有分类
 * @param $link
 * @return array
 */
function getAllCate($link)
{
    $sql = "SELECT id, cName FROM `mooc_cate`";
    $rows = fetchAll($link, $sql);
    return $rows;
}

/**
 * 检查分类下是否有产品
 * @param $link
 * @param $cid
 * @return array
 */
function checkProExist($link, $cid)
{
    $sql = "SELECT * FROM `mooc_pro` WHERE cId={$cid}";
    $rows = fetchAll($link, $sql);
    return $rows;
}