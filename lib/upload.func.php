<?php
function buildInfo()
{
    if (!$_FILES) {
        return;
    }
    $i = 0;
    foreach ($_FILES as $v) {
        if (is_string($v['name'])) {//单文件
            $files[$i] = $v;
            $i++;
        } else {//多文件
            foreach ($v['name'] as $key => $val) {
                $files[$i]['name'] = $val;
                $files[$i]['size'] = $v['size'][$key];
                $files[$i]['tmp_name'] = $v['tmp_name'][$key];
                $files[$i]['error'] = $v['error'][$key];
                $files[$i]['type'] = $v['type'][$key];
                $i++;
            }
        }
    }
    return $files;
}

function uploadFile($path = "uploads", $imgFlag = true, $allowExt = ['gif', 'jpeg', 'jpg', 'png', 'wbmp'], $maxSize = 209715200)
{
    $i = 0;
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    $files = buildInfo();
    if (!($files && is_array($files))) {
        return;
    }
    foreach ($files as $file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $ext = getExt($file['name']);
            if (!in_array($ext, $allowExt)) {
                exit('非法文件类型');
            }
            if ($imgFlag) {
                if (!getimagesize($file['tmp_name'])) {
                    exit('不是真正的图片类型');
                }
            }
            if ($file['size'] > $maxSize) {
                exit('上传文件过大');
            }
            if (!is_uploaded_file($file['tmp_name'])) {
                exit('不是通过POST方式上传');
            }
            $filename = getUniName() . "." . $ext;
            $destination = $path ."/". $filename;
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $file['name'] = $filename;
                unset($file['tmp_name'], $file['type'], $file['size']);
                $uploadedFiles[$i] = $file;
                $i++;
            }
        } else {
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    $mes = "超过配置文件中上传文件的大小";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $mes = "超过表单设置的上传大小";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $mes = "文件部分被上传";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $mes = "没有文件被上传";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $mes = "没有找到临时目录";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $mes = "文件不可写";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $mes = "PHP的扩展程序中断了文件上传";
                    break;
                default:
                    $mes = "未知错误";
                    break;
            }
            echo $mes;
        }
    }
    return $uploadedFiles;
}

//print_r(uploadFile());
