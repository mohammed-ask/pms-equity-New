<?php
include "main/session.php";
/* @var $obj db */
ob_start();
$id = $_GET['hakuna'];
$res = $obj->updatewhere("listedstocks", ["status" => 99], "id=$id");
echo "Stock  Deleted Successfully";
