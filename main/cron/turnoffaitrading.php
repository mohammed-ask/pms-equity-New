<?php
date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');

if (!defined("BASE_URL")) {
    define("BASE_URL", "https://pmsequity.com/");
}

$host = "localhost";
// $database_Username = "hc020wtvnu2k";
// $database_Password = "PMSEquity@1998";
// $database_Name = "pmsequity";
// $timeskip = '+12:30';

//Hostinger Server
$database_Username = "u477898878_eagleeye";
$database_Password = "3oD|BvKe*Z[j";
$database_Name = "u477898878_eagleeye";
$timeskip = '+5:30';

// Local
// $database_Username = "root";
// $database_Password = "";
// $database_Name = "indiastock";
// $timeskip = '+00:00';

$siteurl = "https://pmsequity.com/";
$port = 3306;
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Market API Details
define("APP_NAME2", "5P50439284");
define("CLIENT_CODE2", "50439284");
define("KEY2", "51uZHJivBrXpGMo3t8ECLW11GbyOlEsK");
define("USER_ID2", "AZQ6KXRzw5A");
define("PASSWORD2", "UNfA3hnLH4u");
define("APP_VERSION", "1.0");
define("OS_NAME", "WEB");

/* object for db class in function.php $obj */
$obj = new db($host, $database_Username, $database_Password, $database_Name, $port);
class db
{
    /* main db class for @var $this */

    public $con, $employeeid;

    /* Create class Counstructor in which we create Data Base Connection And default db operation */

    public function __construct($hostname, $username, $password, $dbname, $port)
    {
        $this->employeeid = 0;
        if (isset($_SESSION['userid'])) {
            $this->employeeid = $_SESSION['userid'];
        }
        $this->con = mysqli_connect($hostname, $username, $password, $dbname, $port) or die("not connected" . mysqli_error());
        $this->execute("SET NAMES utf8");
        $this->execute("SET collation_connection = 'utf8_general_ci'");
    }

    /* Default db operation start */

    function execute($sql, $print = 0)
    {
        $employeeid = $this->employeeid;

        $sql11 = $sql;
        $sql . "<br><br><br>";
        $da = date("Ymd");
        if ($print) {
            echo $sql;
        }
        $result = mysqli_query($this->con, $sql) or die($sql . mysqli_error($this->con));
        return $result;
    }

    function escape($data)
    {
        return mysqli_real_escape_string($this->con, $data);
    }


    function selectextrawhereupdate($tb_name, $field, $where, $print = 0)
    {
        $sql = " select $field from $tb_name where $where ";
        $result = $this->execute($sql, $print);
        return $result;
    }
    function fetch_assoc($result)
    {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    function updatewhere($tb_name, $tb_col_name, $sid, $print = 0)
    {
        $update = array();
        foreach ($tb_col_name as $col_name => $form_field) {
            $update[] = '`' . $col_name . '` = \'' . $this->escape($form_field) . '\'';
        }
        $sql = "update $tb_name set " . implode(',', $update) . " where $sid";

        $result = $this->execute($sql, $print);
        if ($result) {
            return 1;
        } else {
            //            echo "error";
        }
    }

    function selectextrawhere($tb_name, $where, $print = 0)
    {
        /**
         * (PHP 4, PHP 5, PHP 7)<br/>
         * Alias of <b>selectextrawhere</b>
         * @link http://abaxsoft.com/manual/en/function.php
         * @param $tb_name
         * @param $where
         */
        $sql = " select * from $tb_name where $where";
        $result = $this->execute($sql, $print);
        return $result;
    }

    function total_rows($result)
    {
        $num = mysqli_num_rows($result);
        return $num;
    }

    function insertid()
    {
        return mysqli_insert_id($this->con);
    }

    function insertnew($tb_name, $postdata, $print = 0)
    {
        foreach ($postdata as $key => $value) {
            $tbl[$key] = $key;
            $postdata[$key] = $this->escape($value);
        }
        $tbl_coloumn_name = array(implode('`, `', $tbl));
        $tbl_data = array(implode("', '", $postdata));
        $tb_col_name1 = "`" . implode("`, `", $tbl_coloumn_name) . "`";
        $form_field1 = implode("', '", $tbl_data);
        $sql = "insert into $tb_name ($tb_col_name1) values ('$form_field1')";
        if ($this->execute($sql, $print)) {
            $insertid = $this->insertid($this->con);
            if ($insertid) {
                return $insertid;
            } else {
                return FALSE;
            }
        } else {
            return false;
        }
    }

    function update($tb_name, $tb_col_name, $sid, $print = 0)
    {
        $update = array();
        foreach ($tb_col_name as $col_name => $form_field) {
            $form_field = trim($form_field);
            $update[] = '`' . $col_name . '` = \'' . $this->escape($form_field) . '\'';
        }
        $sql = "update $tb_name set " . implode(',', $update) . " where id='$sid'";
        //echo $sql;
        $result = $this->execute($sql, $print);
        //echo $result;
        if ($result) {
            return 1;
        } else {
            //echo "error";
        }
    }

    function selectfield($tb_name, $field, $col_name, $sid, $print = 0)
    {
        $sql = "select $field as `value` from $tb_name where $col_name = '$sid'";
        $result = $this->execute($sql, $print);
        $numrow = $this->total_rows($result);
        if ($numrow > 0) {
            $row = $this->fetch_assoc($result);
            $return = $row['value'];
        } else {
            $return = "Not Applicable";
        }
        return $return;
    }

    function selectfieldwhere($tb_name, $field, $where, $print = 0)
    {
        $sql = "select $field as `value` from $tb_name where $where";
        $result = $this->execute($sql, $print);
        $numrow = $this->total_rows($result);
        if ($numrow > 0) {
            $row = $this->fetch_assoc($result);
            $return = $row['value'];
        } else {
            $return = "";
        }
        return $return;
    }

    function saveactivity($activity, $reason, $activityid, $supportid, $department, $category, $how = "By Software")
    {
        /* activity Log */
        $log['activity'] = $activity;
        $log['remark'] = $reason;
        $log['how'] = $how;
        $log['activityid'] = $activityid;
        $log['supportid'] = $supportid;
        $log['department'] = $department;
        $log['category'] = $category;
        // $log['ip'] = $_SERVER['REMOTE_ADDR'];
        $log['city'] = "";
        $log['added_by'] = $this->employeeid;
        $log['added_on'] = date("Y-m-d H:i:s");
        $log['updated_by'] = $this->employeeid;
        $log['updated_on'] = date("Y-m-d H:i:s");
        $log['status'] = "1";
        $this->insertnew("activitylog", $log);
    }

    function fivepaisaapi($userstock)
    {

        $headArry = array(
            'appName' => APP_NAME2,
            'appVer' => APP_VERSION,
            'key' => KEY2,
            'osName' => OS_NAME,
            'requestCode' => '5PMF',
            'userId' => USER_ID2,
            'password' => PASSWORD2,
        );

        $subArray = $userstock;
        // array(
        //     ["Exch" => "N", "ExchType" => "C", "Symbol" => "BHEL", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "RELIANCE", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""],
        //     ["Exch" => "N", "ExchType" => "C", "Symbol" => "AXISBANK", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]
        // );
        $bodyArry = array(
            'Count' => 1,
            'MarketFeedData' => $subArray,
            'ClientLoginType' => 0,
            'LastRequestTime' => '/Date(0)/',
            'RefreshRate' => 'H',
        );
        $requestData = array("head" => $headArry, "body" => $bodyArry);

        $data_string = json_encode($requestData);

        $ch = curl_init('https://openapi.5paisa.com/VendorsAPI/Service1.svc/MarketFeed');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
            )
        );

        $result = curl_exec($ch);
        // print_r($result);
        $result = json_decode($result, true);
        return $result['body']['Data'];
    }
}


$obj->saveactivity("AI trading turn off", "", 0, 0, "User", "AI trading turn off");

// Carry forward Share
$xx['aitrading'] = 'No';
$xx['aifund'] = 0;
$cf = $obj->updatewhere("users", $xx, "status = 1 and aitrading='Yes'");

$xy['status'] = 0;
$cf = $obj->updatewhere("aitraders", $xy, "status = 1");
