<?php
include "./session.php";
$type = $_POST['type'];
$value = $_POST['value'];
if ($value === 'No') {
    $obj->update('users', [$type => 'Yes'], $employeeid);

    $xx['userid'] = $employeeid;
    $xx['added_on'] = date('Y-m-d H:i:s');
    $xx['status'] = 1;
    $obj->insertnew('aitraders', $xx);
} elseif ($value === 'Yes') {
    $obj->update('users', [$type => 'No'], $employeeid, 1);
}
echo "Success";
