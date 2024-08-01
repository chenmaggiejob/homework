<?php
// 清洗資料
include_once "../../class/base_student.php";
$data = $_GET;
$Students = new DB('students');
$Students->rollbackFun();
