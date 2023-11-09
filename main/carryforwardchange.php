<?php
include "./session.php";
if ($_POST['type'] === 'Carryforward') {
    $xx['carryforward'] = $_POST['value'];
    $update = $obj->update('users', $xx, $employeeid);
} else {
    $xx['longholding'] = $_POST['value'];
    $update = $obj->update('users', $xx, $employeeid);
}
if ($update === 1) {
    echo 'success';
}
