<?php
function connect()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("数据库连接失败ERROR:" . mysqli_errno($link) . ":" . mysqli_error($link));
    mysqli_set_charset($link, DB_CHARSET);
    return $link;
}

function insert($link, $table, $array)
{
    $keys = join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "INSERT {$table}($keys) VALUES({$vals})";

    mysqli_query($link, $sql);
    return mysqli_insert_id($link);
}

function update($link, $table, $array, $where = null)
{
    $str = "";
    foreach ($array as $key => $val) {
        if (empty($str)) {
            $sep = "";
        } else {
            $sep = ",";
        }
        $str .= $sep . $key . "='" . $val . "'";
    }
    $sql = "UPDATE {$table} SET {$str}" . ($where == null ? null : " where " . $where);
    mysqli_query($link, $sql);
    return mysqli_affected_rows($link);
}

function delete($link, $table, $where = null)
{
    $where = $where == null ? null : " where " . $where;
    $sql = "DELETE FROM {$table} {$where}";
    mysqli_query($link, $sql);
    return mysqli_affected_rows($link);
}

function fetchOne($link, $sql, $result_type = MYSQLI_ASSOC)
{
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, $result_type);
    return $row;
}

function fetchAll($link, $sql, $result_type = MYSQLI_ASSOC)
{
    $result = mysqli_query($link, $sql);
    $rows = [];
    while (@$row = mysqli_fetch_array($result, $result_type)) {
        $rows[] = $row;
    }
    return $rows;
}


function getResultNum($link, $sql)
{
    $result = mysqli_query($link, $sql);
    return mysqli_num_rows($result);
}



