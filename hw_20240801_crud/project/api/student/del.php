<?php
include_once "../../class/base_student.php";
dd($_GET);
$Students = new DB('students');
$id = $_GET['id'];
$Students->del($id);
// $data = $_GET;
