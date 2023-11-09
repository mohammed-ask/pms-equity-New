<?php
include "session.php";
$oldpass = $obj->selectfieldwhere('users', 'password', "id=$employeeid");
if ($_SESSION['otp'] == $_POST['otp'] && $_POST['oldpassword'] === $oldpass) {
    // $path = "main/images/avatars";
    // if (!empty($_FILES['avatar']['name'])) {
    //     $imgreturn = $obj->uploadfilenew($path, $_FILES, "avatar", array("jpg", "jpeg", "png", "gif"));
    //     $xx['avatar'] = $imgreturn;
    // }
    // if (isset($_POST['carryforward'])) {
    //     $xx['carryforward'] = $_POST['carryforward'];
    // } else {
    //     $xx['carryforward'] = 'No';
    // }
    // $xx['mobile'] = $_POST['mobile'];
    // if (isset($_POST['longholding'])) {
    //     $xx['longholding'] = $_POST['longholding'];
    // } else {
    //     $xx['longholding'] = 'No';
    // }
    // $xx['trademode'] = $_POST['trademode'];
    $xx['password'] = $_POST['password'];
    $user = $obj->update("users", $xx, $employeeid);
    echo "Redirect : Profile Updated Successfully URLprofile";
} else {
    echo "<div class='alert alert-danger'>Invalid OTP. Please provide a valid code.</div>";
}
