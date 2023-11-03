<?php
include "main/session.php";
/* @var $obj db */
$id = $obj->selectfield("personal_detail", "id", "status", "11");
if ($id == "Not Applicable") {
    // $path = "main/uploads";
    // if (!empty($_FILES["logo_upload"]["name"])) {
    //     $imgreturn = $obj->uploadfilenew($path, $_FILES, "logo_upload",  array("jpg", "jpeg", "png"));
    //     $personal["uploadfile_id"] = $imgreturn;
    // }
    // if (!empty($_FILES["favicon"]["name"])) {
    //     $imgreturn = $obj->uploadfilenew($path, $_FILES, "favicon",  array("jpg", "jpeg", "png"));
    //     $personal["faviconicon"] = $imgreturn;
    // }

    $common_data['added_on'] = date('Y-m-d H:i:s');
    $common_data['added_by'] = $employeeid;
    $common_data['updated_on'] = date('Y-m-d H:i:s');
    $common_data['updated_by'] = $employeeid;
    $common_data['status'] = 11;

    if (isset($_POST["personal_detail"])) {
        $personal["phone"] = $_POST["phone"];
        // $personal["short_name"] = $_POST["short_name"];
        $personal["website"] = $_POST["website"];
        // $personal["company_name"] = $_POST["company_name"];
        // $personal["gst_no"] = $_POST["gst_no"];
        $personal['email'] = $_POST["email"];
        $personal['address_1'] = $_POST["address_line_1"];
        // $personal['pincode'] = $_POST["pincode"];
        // $personal['city'] = $_POST["city"];
        // $personal['country_id'] = $_POST["country_id"];
        $personal = $personal + $common_data;
        // if (isset($_POST["indian_state"])) {
        //     $personal['indian_state'] = $_POST["indian_state"];
        // } else {
        //     $personal['state'] = $_POST["state"];
        // }
    }
    if (isset($_POST["bank_detail"])) {
        if (!empty($_FILES["paymentqr"]["name"])) {
            $imgreturn = $obj->uploadfilenew($path, $_FILES, "paymentqr",  array("jpg", "jpeg", "png"));
            $personal["paymentqr"] = $imgreturn;
        }
        $personal["bank_name"] = $_POST["bank_name"];
        $personal["account_name"] = $_POST["account_name"];
        $personal["account_type_id"] = $_POST["account_type_id"];
        $personal["account_number"] = $_POST["account_no"];
        $personal["ifsc_code"] = $_POST["ifsc_code"];
        // $personal["swift_code"] = $_POST["swift_code"];
        // $personal['micr_no'] = $_POST["micr_code"];
        // $personal['branch_name'] = $_POST["branch_name"];
        $personal = $personal + $common_data;
    }
    // if (isset($_POST["company_detail"])) {
    //     $personal["gumasta_no"] = $_POST["gumasta_no"];
    //     $personal["msme_no"] = $_POST["msme_no"];
    //     $personal["sme_no"] = $_POST["sme_no"];
    //     $personal["cin_no"] = $_POST["cin_no"];
    //     $personal["hsn_code"] = $_POST["hsn_code"];
    //     $personal["sac_code"] = $_POST["sac_code"];
    //     $personal["tan_no"] = $_POST["tan_no"];
    //     $personal['pan_no'] = $_POST["pan_no"];
    // }
    $tb_name = "personal_detail";
    $pradin = $obj->insertnew($tb_name, $personal);
    if (is_integer($pradin) && $pradin > 0) {
        echo "Redirect : Personal Details has been Added  URLsettings";
    } else {
        echo "Some Error Occured";
    }
} else {
    $path = "main/uploads";
    // if (!empty($_FILES["logo_upload"]["name"])) {
    //     $uplid = $obj->selectfield("personal_detail", "uploadfile_id", "id", $id);
    //     $oldfile = $obj->selectfield("uploadfile", "path", "id", $uplid);
    //     if (file_exists($oldfile)) {
    //         $delfile = unlink($oldfile);
    //         $del_file = $obj->updatewhere("uploadfile", ["status" => 99], "id=$uplid");
    //     }
    //     $imgreturn = $obj->uploadfilenew($path, $_FILES, "logo_upload",  array("jpg", "jpeg", "png"));
    //     $personal['uploadfile_id'] = $imgreturn;
    // }
    // if (!empty($_FILES["favicon"]["name"])) {
    //     $uplid = $obj->selectfield("personal_detail", "faviconicon", "id", $id);
    //     $oldfile = $obj->selectfield("uploadfile", "path", "id", $uplid);
    //     if (file_exists($oldfile)) {
    //         $delfile = unlink($oldfile);
    //         $del_file = $obj->updatewhere("uploadfile", ["status" => 99], "id=$uplid");
    //     }
    //     $imgreturn = $obj->uploadfilenew($path, $_FILES, "favicon",  array("jpg", "jpeg", "png"));
    //     $personal["faviconicon"] = $imgreturn;
    // }

    $common_data['updated_on'] = date('Y-m-d H:i:s');
    $common_data['updated_by'] = $employeeid;
    if (isset($_POST["personal_detail"])) {
        $personal["phone"] = $_POST["phone"];
        // $personal["short_name"] = $_POST["short_name"];
        // $personal["website"] = $_POST["website"];
        $personal["email"] = $_POST["email"];
        // $personal["company_name"] = $_POST["company_name"];
        // $personal["gst_no"] = $_POST["gst_no"];
        $personal['address_1'] = $_POST["address_line_1"];
        // $personal['pincode'] = $_POST["pincode"];
        // $personal['city'] = $_POST["city"];
        // $personal['country_id'] = $_POST["country_id"];
        // if (isset($_POST["indian_state"])) {
        //     $personal['indian_state'] = $_POST["indian_state"];
        //     $query = "update personal_detail set state = '' where id= $id";
        //     $obj->execute($query);
        // } else {
        //     $personal['state'] = $_POST["state"];
        //     $query = "update personal_detail set indian_state = null where id= $id";
        //     $obj->execute($query);
        // }
        $personal = $personal + $common_data;
    }
    if (isset($_POST["bank_detail"])) {
        $path = "main/uploads";

        if (!empty($_FILES["paymentqr"]["name"])) {
            $uplid = $obj->selectfield("personal_detail", "paymentqr", "id", $id);
            $oldfile = $obj->selectfield("uploadfile", "path", "id", $uplid);
            if (file_exists($oldfile)) {
                $delfile = unlink($oldfile);
                $del_file = $obj->updatewhere("uploadfile", ["status" => 99], "id=$uplid");
            }
            $imgreturn = $obj->uploadfilenew($path, $_FILES, "paymentqr",  array("jpg", "jpeg", "png"));
            $personal["paymentqr"] = $imgreturn;
        }
        $personal["bank_name"] = $_POST["bank_name"];
        $personal["account_name"] = $_POST["account_name"];
        $personal["upiid"] = $_POST["upiid"];
        $personal["account_number"] = $_POST["account_no"];
        $personal["ifsc_code"] = $_POST["ifsc_code"];
        // $personal['branch_name'] = $_POST["branch_name"];
        $personal = $personal + $common_data;
    }
    // if (isset($_POST["company_detail"])) {
    //     $personal["gumasta_no"] = $_POST["gumasta_no"];
    //     $personal["msme_no"] = $_POST["msme_no"];
    //     $personal["sme_no"] = $_POST["sme_no"];
    //     $personal["cin_no"] = $_POST["cin_no"];
    //     $personal["hsn_code"] = $_POST["hsn_code"];
    //     $personal["sac_code"] = $_POST["sac_code"];
    //     $personal["tan_no"] = $_POST["tan_no"];
    //     $personal['pan_no'] = $_POST["pan_no"];
    // }
    $tb_name = "personal_detail";
    $pradin = $obj->update($tb_name, $personal, $id);
    $obj->saveactivity("Personal Details Change", "", $id, $id, "Admin", "Personal Details Change");
    if ($pradin == 1) {
        echo "Redirect : Personal Details has been Updated! URLsettings";
    }
}
