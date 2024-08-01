<?php
// 清洗資料
include_once "../../class/base.php";
$data = $_GET;
$Teachers = new DB('teachers');
$Teachers->rollbackFun();
