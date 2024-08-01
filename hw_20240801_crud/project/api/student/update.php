<?php
include_once "../../class/base_student.php";
$data = $_GET;
$Students = new DB('students');
// dd($data);
$Students->update($data);
