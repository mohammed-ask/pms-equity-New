<?php
include "main/session.php";
$emailcount = $obj->selectfieldwhere('users', "count(id)", "email='" . $_POST['email'] . "' and status != 99");
if ($emailcount > 0) {
    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! This Mail Already Exists </div>";
} else {
    $result4 = $obj->selectextrawhere('codegenerator', "`category` like 'employeecode'");
    $num4 = $obj->total_rows($result4);
    $codegeneratorid = 0;
    $codenumber = 0;
    if ($num4) {
        $row4 = $obj->fetch_assoc($result4);
        $codegeneratorid = $row4['id'];
        $codenumber = $row4['number'] + 1;
        $generatedcode = sprintf('%04d', $codenumber);
        $row4['prefix'] = $employeeid === $adminid ? "EET" : "EETE";
        // $month = strtoupper(date("M", strtotime($date)));
        $uniqueid = str_replace(array("{prefix}", "{number}"), array($row4['prefix'], $generatedcode), $row4['pattern']);
    } else {
        $cg['prefix'] = $employeeid === $adminid ? "EET" : "EETE";
        $cg['number'] = 0;
        $cg['pattern'] = "{prefix}{number}";
        $cg['category'] = "employeecode";
        // $fsed = getfirstandlastday($date);
        $cg['addedon'] = date("Y-m-d H:i:s");
        $cg['addedby'] = $employeeid;
        $cg['status'] = 1;
        $codegeneratorid = $obj->insertnew("codegenerator", $cg);
        $codenumber = 1;
        $generatedcode = sprintf('%03d', $codenumber);
        $uniqueid = str_replace(array("{prefix}", "{number}"), array($cg['prefix'], $generatedcode), $cg['pattern']);
    }
    $n['number'] = $codenumber;
    $obj->update("codegenerator", $n, $codegeneratorid);
    $xx['usercode'] = $uniqueid;
    $xx['added_on'] = date('Y-m-d H:i:s');
    $xx['added_by'] = $employeeid;
    $xx['updated_on'] = date('Y-m-d H:i:s');
    $xx['updated_by'] = $employeeid;
    $xx['status'] = 1;
    $xx['mobile'] = $_POST['phone'];
    $xx['name'] = $_POST['name'];
    $xx['type'] = 1;
    $xx['role'] = $_POST['role'];
    $xx['email'] = $_POST['email'];
    $xx['password'] = $_POST['password'];
    $xx['activate'] = $_POST['activate'];
    $pradin = $obj->insertnew("users", $xx);
    $obj->saveactivity("Add New Employee", "", $pradin, $pradin, "Admin", "Add New Employee");
    if (is_numeric($pradin) && $pradin > 0) {
        echo "Redirect : Employee Added Successfully URLemployeelist";
    }
}
