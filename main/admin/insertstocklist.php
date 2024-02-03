<?php
include "main/session.php";
$samesymbol = $obj->selectfieldwhere("listedstocks", "count(id)", "Symbol = '" . $_POST['Symbol'] . "'");
if (!empty($samesymbol)) {
    echo "<div class='alert alert-warning'>Symbol Already found</div>";
    die;
}
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
