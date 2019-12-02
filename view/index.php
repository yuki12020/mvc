<?php
include_once "./../class/indexClass.php";
$obj=new index();
var_dump($obj);
$perl = $obj->perl();
var_dump($perl);
?>