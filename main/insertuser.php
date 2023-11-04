<?php
session_start();
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

include './function.php';
include './conn.php';
if ($_SESSION['otp'] != $_POST['otp']) {
    echo "Failed";
} else {
    $defaultstock = array(
        // array(
        //     'Symbol' => 'NIFTY',
        //     'symboltoken' => '999920000',
        // ),
        // array(
        //     'Symbol' => 'SENSEX',
        //     'symboltoken' => '999901',
        // ),
        array(
            'Symbol' => 'RELIANCE',
            'symboltoken' => '2885',
        ),
        array(
            'Symbol' => 'HINDALCO',
            'symboltoken' => '1363',
        ),
        array(
            'Symbol' => 'M&M',
            'symboltoken' => '2031',
        ),
        array(
            'Symbol' => 'INFY',
            'symboltoken' => '1594',
        )
    );
    $emailcount = $obj->selectfieldwhere('users', "count(id)", "email='" . $_POST['email'] . "' and status != 99");
    $empcode = $obj->selectfieldwhere('users', 'count(id)', 'usercode="' . trim($_POST['employeeref']) . '" and type = 1');
    if ($emailcount > 0) {
        echo "Already Exists";
    } elseif ($empcode != 1 && !empty($_POST['employeeref'])) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Sorry! Employee ID Does Not Match With Our Existing Employees  </div>";
    } else {

        $x = array();
        $tb_name = 'users';
        $result4 = $obj->selectextrawhere('codegenerator', "`category` like 'usercode'");
        $num4 = $obj->total_rows($result4);
        $codegeneratorid = 0;
        $codenumber = 0;
        if ($num4) {
            $row4 = $obj->fetch_assoc($result4);
            $codegeneratorid = $row4['id'];
            $codenumber = $row4['number'] + 1;
            $generatedcode = sprintf('%04d', $codenumber);
            // $month = strtoupper(date("M", strtotime($date)));
            $uniqueid = str_replace(array("{prefix}", "{number}"), array($row4['prefix'], $generatedcode), $row4['pattern']);
        } else {
            $cg['prefix'] = "USER";
            $cg['number'] = 0;
            $cg['pattern'] = "{prefix}{number}";
            $cg['category'] = "usercode";
            // $fsed = getfirstandlastday($date);
            $cg['addedon'] = date("Y-m-d H:i:s");
            $cg['addedby'] = 0;
            $cg['status'] = 1;
            $codegeneratorid = $obj->insertnew("codegenerator", $cg);
            $codenumber = 1;
            $generatedcode = sprintf('%04d', $codenumber);
            $uniqueid = str_replace(array("{prefix}", "{number}"), array($cg['prefix'], $generatedcode), $cg['pattern']);
        }
        $n['number'] = $codenumber;
        $obj->update("codegenerator", $n, $codegeneratorid);
        $x['usercode'] = $uniqueid;
        $x['added_on'] = date('Y-m-d H:i:s');
        // $x['added_by'] = 0;
        $x['updated_on'] = date('Y-m-d H:i:s');
        // $x['updated_by'] = 0;
        $x['status'] = 0;
        $x['name'] = ucwords($_POST['username']);
        $x['email'] = $_POST['email'];
        $x['mobile'] = $_POST['mobileno'];
        $x['address'] = $_POST['address'];
        $x['dob'] = $_POST['dob'];
        $x['adharno'] = $_POST['adharno'];
        $x['panno'] = $_POST['panno'];
        $x['bankname'] = $_POST['bankname'];
        $x['accountno'] = $_POST['accountno'];
        $x['ifsc'] = $_POST['ifsc'];
        $x['employeeref'] = $_POST['employeeref'];
        $x['password'] = $_POST['password'];
        $x['limit'] = 1;
        $x['starttime'] = 10;
        $x['endtime'] = 22;
        // $x['policyread'] = $_POST['policyread'];
        $x['type'] = 2;
        $x['role'] = 2;
        $x['longholding'] = 'No';
        $userid = $obj->insertnew($tb_name, $x);
        $path = "uploads/userdocs";
        foreach ($_POST["name"] as $key => $value) {
            $name = 'path' . $key;
            $document[$name]['name'] = $_FILES['path']['name'][$key];
            $document[$name]['type'] = $_FILES['path']['type'][$key];
            $document[$name]['tmp_name'] = $_FILES['path']['tmp_name'][$key];
            $document[$name]['size'] = $_FILES['path']['size'][$key];
            $document[$name]['error'] = $_FILES['path']['error'][$key];
            $y['path'] = $obj->uploadfilenew($path, $document, $name, array("png", "jpg", "jpeg", "webp"));
            $y['name'] = $_POST['name'][$key];
            $y['userid'] = $userid;
            $y['added_on'] = date('Y-m-d H:i:s');
            $y['added_by'] = 0;
            $y['updated_on'] = date('Y-m-d H:i:s');
            $y['updated_by'] = 0;
            $y['status'] = 1;
            $postdata = $y;
            $tb_name = "userdocuments";
            $pradin = $obj->insertnew($tb_name, $postdata);
        }
        foreach ($defaultstock as $ds) {
            $jk['Symbol'] = $ds['Symbol'];
            $jk['symboltoken'] = $ds['symboltoken'];
            $jk['ExchType'] = 'C';
            $jk['Expiry'] = '';
            $jk['OptionType'] = '';
            $jk['StrikePrice'] = '0';
            $jk['mktlot'] = '1';
            $jk['added_on'] = date("Y-m-d H:i:s");
            $jk['added_by'] = 0;
            $jk['updated_on'] = date("Y-m-d H:i:s");
            $jk['updated_by'] = 0;
            $jk['status'] = 1;
            $jk['userid'] = $userid;
            $jk['Exch'] = 'N';
            $obj->insertnew('userstocks', $jk);
        }
        $obj->saveactivity("Customer Registered", "", $userid, $userid, "User", "Customer Registered");
        echo "Success";
    }
}
