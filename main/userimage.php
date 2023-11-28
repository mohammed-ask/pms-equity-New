<?php
include "./session.php";
$path = "images/avatars";
if (!empty($_FILES['image']['name'])) {
    $uplid = $obj->selectfield("users", "avatar", "id", $employeeid);
    $oldfile = $obj->selectfield("uploadfile", "path", "id", $uplid);
    if (file_exists($oldfile)) {
        $delfile = unlink($oldfile);
        $del_file = $obj->updatewhere("uploadfile", ["status" => 99], "id=$uplid");
    }
    $imgreturn = $obj->uploadfilenew($path, $_FILES, "image", array("jpg", "jpeg", "png", "gif"));
    $xx['avatar'] = $imgreturn;
    $user = $obj->update("users", $xx, $employeeid);
    echo "Success";
}
