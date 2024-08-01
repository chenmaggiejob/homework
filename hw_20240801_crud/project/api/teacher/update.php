<?php
include_once "../../class/base.php";
$data = $_GET;
$Teachers = new DB('teachers');
// dd($data);
$Teachers->update($data);
