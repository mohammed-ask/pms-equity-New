<?php
date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');

if (!defined("BASE_URL")) {
    define("BASE_URL", "https://pmsequity.com/");
}

$host = "localhost";
// Go daddy Server
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


$obj->saveactivity("Thurday Cron Run", "", 0, 0, "User", "Thurday Cron Run");

// Carry forward Share
// $xx['type'] = 'Holding';
// $result = $obj->selectfieldwhere(
//     "stocktransaction inner join users on users.id = stocktransaction.userid",
//     "group_concat(stocktransaction.id)",
//     "stocktransaction.status = 0 and tradestatus='Open' and stocktransaction.type = 'Intraday' and date(stocktransaction.added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and users.carryforward='Yes'"
// );
// if (!empty($result)) {
//     $cf = $obj->updatewhere("stocktransaction", $xx, "id in (" . $result . ")");
// }

// Close Trade
$todayopentradeid = $obj->selectfieldwhere(
    "stocktransaction inner join users on users.id = stocktransaction.userid",
    "group_concat(distinct(stockid))",
    "stocktransaction.status = 0 and tradestatus='Open' and users.longholding='No' and stockid != '' and stockid is not null  and exchange in ('N','B')  and exchtype = 'D'"
);
if (!empty($todayopentradeid)) {
    $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "status = 1 and id in (" . $todayopentradeid . ")");
    $rowfetch = mysqli_fetch_all($fetchshare, 1);
    $stockdata = $obj->fivepaisaapi($rowfetch);
}
$result = $obj->selectextrawhereupdate(
    "stocktransaction inner join users on users.id = stocktransaction.userid",
    "stockid,symbol,exchange,qty,price,userid,stocktransaction.id,stocktransaction.type,stocktransaction.limit,stocktransaction.totalamount,users.investmentamount,borrowedamt,borrowedprcnt,trademethod,mktlot",
    "stocktransaction.status = 0 and  tradestatus='Open' and users.longholding='No' and stockid != '' and stockid is not null  and exchange in ('N','B') and exchtype = 'D'"
);
while ($row = $obj->fetch_assoc($result)) {
    $symbol = $row['symbol'];
    $excg = $row['exchange'];
    $token = $obj->selectfieldwhere("userstocks", "symboltoken", "id=" . $row['stockid'] . "");
    $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg, $token) {
        if ($data['Token'] == $token) {
            return $data;
        }
    });
    $keys = array_keys($pricedata)[0];
    $currentrate = $pricedata[$keys]['LastRate'];
    $xc['added_on'] = date("Y-m-d H:i:s");
    $xc['updated_on'] = date("Y-m-d H:i:s");
    $xc['status'] = 1;
    // $xc['symbol'] = $symbol;
    // $xc['exchange'] = $excg;
    $xc['qty'] = $row['qty'];
    $xc['price'] = $currentrate;
    if ($row['borrowedamt'] > 0) {
        $profitAndLoss = $row['mktlot'] * $row['qty'] * ($currentrate - $row['price']);
        if ($row['price'] > 0) {
            $xc['profitprcnt'] = round($profitAndLoss / ($row['price'] * $row['mktlot'] * $row['qty']) * 100, 2);
        } else {
            $xc['profitprcnt'] = 0;
        }
        if ($row['trademethod'] === 'Sell') {
            if ($profitAndLoss <= 0) {
                $profitAndLoss = abs($profitAndLoss);
                $xc['profitprcnt'] = abs($xc['profitprcnt']);
            } else {
                $profitAndLoss = -$profitAndLoss;
                $xc['profitprcnt'] = -$xc['profitprcnt'];
            }
        }
        if ($profitAndLoss > 0) {
            $custshare = 100 - $row['borrowedprcnt'];
            $xc['totalprofit'] = round($profitAndLoss, 2);
            $xc['profitamount'] = round($profitAndLoss * $custshare / 100, 2);
        } else {
            $xc['profitamount'] = round($profitAndLoss, 2);
            $xc['totalprofit'] = $xc['profitamount'];
        }
    } else {
        $xc['profitamount'] = $row['mktlot'] * $row['qty'] * ($currentrate - $row['price']);
        if ($row['price'] > 0) {
            $xc['profitprcnt'] = round($xc['profitamount'] / ($row['price'] * $row['mktlot'] * $row['qty']) * 100, 2);
        } else {
            $xc['profitprcnt'] = 0;
        }
        $xc['totalprofit'] = $xc['profitamount'];
        if ($row['trademethod'] === 'Sell') {
            if ($xc['profitamount'] <= 0) {
                $xc['profitamount'] = abs($xc['profitamount']);
                $xc['totalprofit'] = $xc['profitamount'];
                $xc['profitprcnt'] = abs($xc['profitprcnt']);
            } else {
                $xc['profitamount'] = -$xc['profitamount'];
                $xc['totalprofit'] = $xc['profitamount'];
                $xc['profitprcnt'] = -$xc['profitprcnt'];
            }
        }
    }
    // $xc['totalamount'] = ($currentrate / $row['limit']) * $row['qty'];
    // $xc['profitamount'] = $row['qty'] * ($currentrate - $row['price']);
    $xc['userid'] = $row['userid'];
    $xc['tradeid'] = $row['id'];
    $xc['profitsettled'] = $xc['profitamount'] < 0 ? 1 : 0;
    // $xc['type'] = $row['type'];
    // $xc['limit'] = $row['limit'];
    // $xc['tradestatus'] = '';
    $close = $obj->insertnew("closetradedetail", $xc);
    if ($close > 0) {
        $yy["tradestatus"] = 'Close';
        $yy['status'] = 1;
        $trade = $obj->update("stocktransaction", $yy, $xc['tradeid']);
        if ($trade > 0) {
            if ($xc['totalprofit'] >= 0) {
                $useramt = $row['totalamount'] + $xc['totalprofit'] - $row['borrowedamt'];
            } else {
                $useramt = $row['totalamount'] - $row['borrowedamt'] + $xc['totalprofit'];
            }
            // $useramount = $useramt + $xc['profitamount'];
            $investmentamount = $obj->selectfieldwhere("users", "investmentamount", "id='" . $row['userid'] . "'");
            $kk['investmentamount'] = $investmentamount + $useramt;
            $user = $obj->update("users", $kk, $row['userid']);
            if ($user > 0) {
                echo "Redirect : Trade Closed Succesfully  URLportfolio";
            } else {
                echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Some Error Occured Please Contact Admin</div>";
    }
}
