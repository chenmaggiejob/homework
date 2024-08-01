<?php
include_once "../../class/base.php";
dd($_GET);
$Teachers = new DB('teachers');
$id = $_GET['id'];
$Teachers->del($id);
// $data = $_GET;
