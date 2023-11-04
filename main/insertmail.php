<?php
include "main/session.php";

// $adminemail = $obj->selectfieldwhere('users', "email", "id=" . $employeeid . "");
// $receivermail = $obj->selectfieldwhere('users', "email", "id=" . $_POST['userid'] . "");
$path = "main/mailfiles";
$vy['added_on'] = date('Y-m-d H:i:s');
$vy['added_by'] = $employeeid;
$vy['updated_on'] = date('Y-m-d H:i:s');
$vy['updated_by'] = $employeeid;
$vy['status'] = 1;
$vy['senderid'] = $employeeid;
$vy['receiverid'] = $_POST['userid'];
$vy['subject'] = $_POST['subject'];
$vy['message'] = $_POST['message'];
$mailid = $obj->insertnew('mail', $vy);
$obj->saveactivity("Mail to Admin", "", $mailid, $mailid, "User", "Mail to Admin");
if (!empty($_FILES['files']['name'][0])) {
    foreach ($_FILES['files']["name"] as $key => $value) {
        $name = 'path' . $key;
        $document[$name]['name'] = $_FILES['files']['name'][$key];
        $document[$name]['type'] = $_FILES['files']['type'][$key];
        $document[$name]['tmp_name'] = $_FILES['files']['tmp_name'][$key];
        $document[$name]['size'] = $_FILES['files']['size'][$key];
        $document[$name]['error'] = $_FILES['files']['error'][$key];
        $y['path'] = $obj->uploadfilenew($path, $document, $name, array("png", "jpg", "jpeg", "pdf", "word", "webp"));
        $y['senderid'] = $employeeid;
        $y['receiverid'] = $_POST['userid'];
        $y['mailid'] = $mailid;
        $y['added_on'] = date('Y-m-d H:i:s');
        $y['added_by'] = $employeeid;
        $y['updated_on'] = date('Y-m-d H:i:s');
        $y['updated_by'] = $employeeid;
        $y['status'] = 1;
        $postdata = $y;
        $tb_name = "maildocuments";
        $pradin = $obj->insertnew($tb_name, $postdata);
    }
}
echo "Redirect :  Message sent! URLmail";
