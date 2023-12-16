<?php
date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');
$platform = "Production";
$host = "localhost";
$database_Username = "root";
$database_Password = "";
$database_Name = "pmsequitynew";
$siteurl = "http://localhost/indiastock/";
$port = 3306;
$platform = "test";
if (($_SERVER['HTTP_HOST'] == 'localhost')) {
    if (!defined("BASE_URL")) {
        define("BASE_URL", "http://" . $_SERVER['HTTP_HOST'] . "/pmsequityNew/");
    }
    $host = "localhost";
    $database_Username = "root";
    $database_Password = "";
    $database_Name = "pmsequitynew";
    $siteurl = "http://localhost/indiastock/";
    $port = 3306;
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $platform = "test";
} elseif ($_SERVER['HTTP_HOST'] == 'stocktradeindia.000webhostapp.com') {
    if (!defined("BASE_URL")) {
        define("BASE_URL", "https://" . $_SERVER['HTTP_HOST'] . "/");
    }
    $host = "localhost";
    $database_Username = "id20083609_root";
    $database_Password = "^yv3Z(G([N7{qrxW";
    $database_Name = "id20083609_indiastock";
    $siteurl = "https://" . $_SERVER['HTTP_HOST'] . "/";
    $port = 3306;
    $platform = "test";
} elseif ($_SERVER['HTTP_HOST'] == 'eagleeyetradings.com') {
    if (!defined("BASE_URL")) {
        define("BASE_URL", "https://eagleeyetradings.com/");
    }
    $host = "localhost";
    $database_Username = "u477898878_eagleeye";
    $database_Password = "3oD|BvKe*Z[j";
    $database_Name = "u477898878_eagleeye";
    $siteurl = "https://eagleeyetradings.com/";
    $port = 3306;
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $platform = "Production";
}

date_default_timezone_set('Asia/Kolkata');
/* object for db class in function.php $obj */
$obj = new db($host, $database_Username, $database_Password, $database_Name, $port);

// Main Settings
$sendmailfrom = $platform === 'test'  ? "mohammedhusain559@gmail.com" : 'support@eagleeyetradings.com';
$sendemailpassword = $platform === 'test' ? "svcbitzquirlpwxk" : 'EagleEye@1998';
$supportmail = 'support@eagleeyetradings.com';
$port = $platform === 'test' ? 465 : 465;
$host = $platform === 'test' ? 'smtp.gmail.com' : 'smptout.secureserver.net';
$smtpauth = $platform === 'test' ? true : false;
$issmtp = $platform === 'test' ? true : false;

$defaultemailpassword = $sendemailpassword;

$compdata = $obj->selectextrawhere("personal_detail", "status=11")->fetch_assoc();
$companyname = $compdata["company_name"];
$bankname = $compdata["bank_name"];
$bankbranch = $compdata["company_name"];
$bankaccountno = $compdata["account_number"];
$bankaccountname = $compdata["account_name"];
// $bankactype = $obj->selectfield("bank_account_type", "name", "id", $compdata["account_type_id"]);
$bankifsccode = $compdata["ifsc_code"];
$companylocation = $compdata["city"];
$topadd = $compdata["address_1"] . " " . $compdata["city"] . " Pincode-" . $compdata["pincode"];

$state = ($compdata["state"] == "") ? $obj->selectfield("state_list", "state", "id", $compdata["indian_state"]) : $state;
$country = $obj->selectfield("country", "country_name", "id", $compdata["country_id"]);

$companyaddress = $compdata["address_1"] . ", " . $compdata["city"] . "-" . $compdata["pincode"] . " (" . $state . ") " . $country;
$companyaddress1 = $compdata["address_1"] . ", <br>" . $compdata["city"] . "-" . $compdata["pincode"] . " (" . $state . ") " . $country;
$companyphone = $compdata["phone"];
$companyemailid = $compdata["email"];
$companywebsite = $compdata["website"];
$contactperson = $compdata["person_name"];
$companylogo = $obj->fetchattachment($compdata["uploadfile_id"]);
$companyfavicon = $obj->fetchattachment($compdata["faviconicon"]);
$qrimage = $obj->fetchattachment($compdata['paymentqr']);
$upiid = $compdata['upiid'];
$requesttoken = '';
$redirecturl = ($platform == "test") ?  "http://localhost/pmsequityNew" : "https://eagleeyetradings.com";
if (isset($_GET['RequestToken'])) {
    $requesttoken = $_GET['RequestToken'];
}
$marketopen = false;
$currencysymbol = '₹';
// get current date and time
$now = new DateTime();
$dayOfWeek = $now->format('N');
$hour = $now->format('G');
if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
    if ($hour >= 9 && $hour < 24) {
        $marketopen = true;
    }
}
$timeskip = ($platform == "test") ?  '+00:00' : '+5:30';
$apiinterval = 6000;
$mainpagemaintanance = false;
$dashboardmaintanance = false;
$marketmaintanance = false;
$portfoliomaintanance = false;
$adminid = 54;
define("REQUEST_TOKEN", $requesttoken); //right
define("APP_NAME", "5P50442723"); //right
define("CLIENT_CODE", "50442723"); //right
define("APP_VERSION", "1.0"); //right
define("KEY", "h5rX1slu8HQZIYzXa6AnSvDYAjxqdaEN"); //right
define("OS_NAME", "WEB"); //right
define("USER_ID", "wuxNCXWR30t"); //right
define("PASSWORD", "fSBMTdpZPWA"); //right

// Market API Details
define("APP_NAME2", "5P50442723"); //right
define("CLIENT_CODE2", "50442723"); //right
define("KEY2", "h5rX1slu8HQZIYzXa6AnSvDYAjxqdaEN"); //right
define("USER_ID2", "wuxNCXWR30t"); //right
define("PASSWORD2", "fSBMTdpZPWA"); //right
