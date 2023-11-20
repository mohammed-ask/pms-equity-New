<?php
include "./session.php";
$path = "images/avatars";
if (!empty($_FILES['image']['name'])) {
    $imgreturn = $obj->uploadfilenew($path, $_FILES, "image", array("jpg", "jpeg", "png", "gif"));
    $xx['avatar'] = $imgreturn;
    $user = $obj->update("users", $xx, $employeeid);
    echo "Success";
}
