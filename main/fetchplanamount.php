<?php
include './session.php';
// print_r($_POST);
$id = $_POST['plantypeid'];
$pid = $_POST['planid'];
$plandetail  = $obj->selectfieldwhere('plandetail', "price", "planid=$pid and plantypeid=$id");
echo $plandetail;
