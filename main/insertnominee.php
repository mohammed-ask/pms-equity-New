<?php
include "main/session.php";
$_POST['added_on'] = date("Y-m-d H:i:s");
$_POST['updated_on'] = date("Y-m-d H:i:s");
$_POST['updated_by'] = $employeeid;
$_POST['added_by'] = $employeeid;
$_POST['status'] = 1;
$_POST['userid'] = $employeeid;
$_POST['dob'] = changedateformate($_POST['dob']);
$obj->insertnew("nominee", $_POST);
echo "Redirect : Nominee Added Successfully URLprofile";
