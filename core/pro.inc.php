<?php
/**
 * 添加商品
 * @param $link
 * @return string
 */
function addPro($link)
{
    $arr = $_POST;
    $arr['pubTime'] = time();
    $path = "./uploads";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../image_50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../image_220/" . $uploadFile['name'], 220, 220);
            thumb($path . "/" . $uploadFile['name'], "../image_350/" . $uploadFile['name'], 350, 350);
            thumb($path . "/" . $uploadFile['name'], "../image_800/" . $uploadFile['name'], 800, 800);
        }
    }
    $res = insert($link, "mooc_pro", $arr);
    $pid = getInsertId($link);
    if ($res && $pid) {
        foreach ($uploadFiles as $uploadFile) {
            $arr1['pid'] = $pid;
            $arr1['albumPath'] = $uploadFile['name'];
            addAlbum($link, $arr1);
        }
        $mes = "<p>添加成功!</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
    } else {
        foreach ($uploadFiles as $uploadFile) {
            if (file_exists("../image_800/" . $uploadFile['name'])) {
                unlink("../image_800/" . $uploadFile['name']);
            }
            if (file_exists("../image_50/" . $uploadFile['name'])) {
                unlink("../image_50/" . $uploadFile['name']);
            }
            if (file_exists("../image_220/" . $uploadFile['name'])) {
                unlink("../image_220/" . $uploadFile['name']);
            }
            if (file_exists("../image_350/" . $uploadFile['name'])) {
                unlink("../image_350/" . $uploadFile['name']);
            }
        }
        $mes = "<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";

    }
    return $mes;
}


function getAllProByAdmin($link)
{
    $sql = "SELECT p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName FROM `mooc_pro` AS p JOIN `mooc_cate` AS c ON p.cId=c.id";

    $rows = fetchAll($link, $sql);
    return $rows;
}

function getAllImgByProId($link, $id)
{
    $sql = "SELECT a.albumPath FROM `mooc_album` a WHERE pid={$id}";
    $rows = fetchAll($link, $sql);
    return $rows;
}

function getProById($link, $id)
{
    $sql = "SELECT p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId FROM `mooc_pro` AS p JOIN `mooc_cate` AS c ON p.cId=c.id WHERE p.id={$id}";

    $row = fetchOne($link, $sql);
    return $row;
}

function editPro($link, $id)
{
    $arr = $_POST;
    $arr['pubTime'] = time();
    $path = "./uploads";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../image_50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../image_220/" . $uploadFile['name'], 220, 220);
            thumb($path . "/" . $uploadFile['name'], "../image_350/" . $uploadFile['name'], 350, 350);
            thumb($path . "/" . $uploadFile['name'], "../image_800/" . $uploadFile['name'], 800, 800);
        }
    }
    $where = "id={$id}";
    $res = update($link, "mooc_pro", $arr, $where);
    $pid = $id;
    if ($res && $pid) {
        if ($uploadFiles && is_array($uploadFiles)) {
            foreach ($uploadFiles as $uploadFile) {
                $arr1['pid'] = $pid;
                $arr1['albumPath'] = $uploadFile['name'];
                addAlbum($link, $arr1);
            }
        }

        $mes = "<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
    } else {
        if ($uploadFiles && is_array($uploadFiles)) {
            foreach ($uploadFiles as $uploadFile) {
                if (file_exists("../image_800/" . $uploadFile['name'])) {
                    unlink("../image_800/" . $uploadFile['name']);
                }
                if (file_exists("../image_50/" . $uploadFile['name'])) {
                    unlink("../image_50/" . $uploadFile['name']);
                }
                if (file_exists("../image_220/" . $uploadFile['name'])) {
                    unlink("../image_220/" . $uploadFile['name']);
                }
                if (file_exists("../image_350/" . $uploadFile['name'])) {
                    unlink("../image_350/" . $uploadFile['name']);
                }
            }
        }
        $mes = "<p>更新失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";

    }
    return $mes;
}

function delPro($link, $id)
{
    $where = "id={$id}";
    $res = delete($link, 'mooc_pro', $where);
    $proImags = getAllImgByProId($link, $id);
    if ($proImags && is_array($proImags)) {
        foreach ($proImags as $proImag) {
            if (file_exists("uploads/" . $proImag['albumPath'])) {
                unlink("uploads/" . $proImag['albumPath']);
            }
            if (file_exists("../image_50/" . $proImag['albumPath'])) {
                unlink("../image_50/" . $proImag['albumPath']);
            }
            if (file_exists("../image_220/" . $proImag['albumPath'])) {
                unlink("../image_220/" . $proImag['albumPath']);
            }
            if (file_exists("../image_350/" . $proImag['albumPath'])) {
                unlink("../image_350/" . $proImag['albumPath']);
            }
            if (file_exists("../image_800/" . $proImag['albumPath'])) {
                unlink("../image_800/" . $proImag['albumPath']);
            }

        }
    }
    $where1 = "pid={$id}";
    $res1 = delete($link, 'mooc_album', $where1);
    if ($res && $res1) {
        $mes = "删除成功<a href='listPro.php'>查看商品列表</a>";
    } else {
        $mes = "删除失败<a href='listPro.php'>重新删除</a>";
    }
    return $mes;
}


function getAllPros($link)
{
    $sql = "SELECT p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId FROM `mooc_pro` AS p JOIN `mooc_cate` AS c ON p.cId=c.id";

    $rows = fetchAll($link, $sql);
    return $rows;
}

function getProsByCid($link, $cid)
{
    $sql = "SELECT p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId FROM `mooc_pro` AS p JOIN `mooc_cate` AS c ON p.cId=c.id WHERE p.cId={$cid} LIMIT 4";
    $rows = fetchAll($link, $sql);
    return $rows;
}

function getSmallProsByCid($link, $cid)
{
    $sql = "SELECT p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId FROM `mooc_pro` AS p JOIN `mooc_cate` AS c ON p.cId=c.id WHERE p.cId={$cid} LIMIT 4";
    $rows = fetchAll($link, $sql);
    return $rows;
}

/**
 *得到商品ID和商品名称
 * @return array
 */
function getProInfo($link)
{
    $sql = "select id,pName from mooc_pro order by id asc";
    $rows = fetchAll($link, $sql);
    return $rows;
}