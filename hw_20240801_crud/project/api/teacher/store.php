<?php
include_once "../../class/base.php";
$data = $_GET;
$Teachers = new DB('teachers');
// dd($_GET);
// dd($data);
$Teachers->store($data);
