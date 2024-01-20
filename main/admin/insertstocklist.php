<?php
include "main/session.php";
$xx['added_on'] = date('Y-m-d H:i:s');
// $xx['added_by'] = $employeeid;
// $xx['updated_on'] = date('Y-m-d H:i:s');
// $xx['updated_by'] = $employeeid;
// $xx['status'] = 1;
$xx['Symbol'] = $_POST['Symbol'];
$xx['expiredate'] =  changedateformate($_POST['expiredate']);
$xx['type'] = 'Derivative';
$xx['status'] = 0;
$pradin = $obj->insertnew("listedstocks", $xx);
$obj->saveactivity("Add New Stock For Suggestion", "", $pradin, $employeeid, "Admin", "Add New Stock");
if (is_numeric($pradin) && $pradin > 0) {
    echo "Redirect : Stock Added Successfully URLstocklist";
}
