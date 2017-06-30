<?php
function addAlbum($link, $arr)
{
    insert($link, "mooc_album", $arr);
}

function getProImgById($link, $id)
{
    $sql = "SELECT `albumPath` FROM `mooc_album` WHERE pid={$id} LIMIT 1";
    $row = fetchOne($link, $sql);
    return $row;
}

function getProImgsById($link, $id)
{
    $sql = "SELECT `albumPath` FROM `mooc_album` WHERE pid={$id}";
    $row = fetchAll($link, $sql);
    return $row;
}