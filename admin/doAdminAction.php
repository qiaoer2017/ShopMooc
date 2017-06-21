<?php ;
require_once "../include.php";
$act = $_REQUEST['act'];
if ($act == "logout") {
    logout();
} else {
    alertMessage("非法参数", 'index.php');
}