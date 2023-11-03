<?php

$leagalpoint = '<div style="font-size:9px;font-weight: bold;">
    <br><br><br>
Disclaimer
<br>
This message contains legally privileged and/or confidential information. If you are not the intended recipient(s), or employee or agent responsible for delivery of this message to the intended recipient(s), you are hereby notified that any dissemination, distribution or copying of this e-mail message is strictly prohibited. If you have received this message in error, please immediately notify the sender and delete this e-mail message from your computer.
<br>WARNING: Computer viruses can be transmitted via email. The recipient should check this email and any attachments for the presence of viruses. The company accepts no liability for any damage caused by any virus transmitted by this email.
</div>';

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
        $this->con = mysqli_connect($hostname, $username, $password, $dbname, $port) or die("not connected");
        $this->execute("SET NAMES utf8");
        $this->execute("SET collation_connection = 'utf8_general_ci'");
    }

    /* Default db operation start */

    function execute($sql, $print = 0)
    {
        $employeeid = $this->employeeid;

        $sql11 = $sql;
        //         $sql . "<br><br><br>";
        //         $da = date("Ymd");
        //         mysqli_query($this->con, "CREATE TABLE IF NOT EXISTS `zquerylogs$da`  (
        //   `id` int(255) NOT NULL AUTO_INCREMENT,
        //   `query` text  NULL,
        //   `url` text  NULL,
        //   `added_by` int(255)  NULL,
        //   `added_on` datetime  NULL,
        //   `updated_by` int(255)  NULL,
        //   `updated_on` datetime  NULL,
        //   `status` int(11)  NULL,
        //   PRIMARY KEY (`id`)
        // ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        // ");
        // $sql1 = $this->escape($sql);
        // $url = $_SERVER['REQUEST_URI'];
        // $datetimenow = date("Y-m-d H:i:s");
        // $sql2 = "insert into `zquerylogs$da`(query,url,added_by,added_on,updated_by,updated_on,status) values('$sql1','$url','$employeeid','$datetimenow','$employeeid','$datetimenow',1)";

        // mysqli_query($this->con, $sql2) or die($sql2 . mysqli_error($this->con));

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

    function fetch_assoc($result)
    {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function fetchattachment($aid)
    {
        $ptname = "uploadfile";
        if ($aid != "" && $aid > 0) {
            $pwhere = "id='" . $aid . "'";
            $presult = $this->selectextrawhere($ptname, $pwhere);
            $num = $this->total_rows($presult);
            $prow = $this->fetch_assoc($presult);
            if ($num) {
                return $prow['path'];
            } else {
                return;
            }
        } else {
            return;
        }
    }

    function select($tb_name, $sid, $print = 0)
    {
        $sql = "select * from $tb_name where id like '$sid'";
        if ($print) {
            echo $sql;
        }
        $result = $this->execute($sql);
        return $result;
    }

    function selecttable($tb_name, $print = 0)
    {
        $sql = "select * from `$tb_name` where `status`='1' order by id desc";
        $result = $this->execute($sql, $print);
        return $result;
    }

    function selecttableasc($tb_name, $print = 0)
    {
        $sql = "select * from `$tb_name` where `status`='1' order by id asc";
        $result = $this->execute($sql, $print);
        return $result;
    }

    function selectptable($tb_name, $print = 0)
    {
        $sql = "select * from `$tb_name` where `status`='0' order by id desc";
        $result = $this->execute($sql, $print);
        return $result;
    }

    function selectdtable($tb_name, $print = 0)
    {
        $sql = "select * from `$tb_name` where `status`='99' order by id desc";
        $result = $this->execute($sql, $print);
        return $result;
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

    function selectin($tb_name, $col_name, $values, $print = 0)
    {
        if (!empty($values)) {
            $sql = "select * from $tb_name where `$col_name` in ($values)";
            $result = $this->execute($sql, $print);
            return $result;
        } else {
            return "NA";
        }
    }

    function selectorder($tb_name, $sid, $order, $print = 0)
    {
        $result = $this->selectextrawhere($tb_name, "id like '$sid' $order", $print);
        return $result;
    }

    function fixedselect($tb_name, $tb_col_name, $sid, $print = 0)
    {
        $sql = "select * from $tb_name where `$tb_col_name` like '$sid'";
        $result = $this->execute($sql, $print);
        return $result;
    }

    function fixedselectorder($tb_name, $tb_col_name, $sid, $order, $print = 0)
    {
        $sql = "select * from $tb_name where `$tb_col_name` like '$sid' $order";
        $result = $this->execute($sql, $print);
        return $result;
    }

    function selectextrawhereorder($tb_name, $where, $order)
    {
        $result = $this->selectextrawhere($tb_name, $where . " " . $order);
        return $result;
    }

    /* function for @selectextrawhere */
    /* return array */

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

    function selectextrawhereupdate($tb_name, $field, $where, $print = 0)
    {
        $sql = " select $field from $tb_name where $where ";
        $result = $this->execute($sql, $print);
        return $result;
    }

    /* select function End */

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

    function fixedupdate($tb_name, $tb_col_name, $column, $sid)
    {
        $update = array();
        foreach ($tb_col_name as $col_name => $form_field) {
            $update[] = '`' . $col_name . '` = \'' . $this->escape($form_field) . '\'';
        }
        $sql = "update $tb_name set" . implode(',', $update) . "where `$column`='$sid'";
        $result = $this->execute($sql);
        if ($result) {
            return 1;
        } else {
            //echo "error";
        }
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

    function updatein($tb_name, $tb_col_name, $sid)
    {
        $update = array();
        foreach ($tb_col_name as $col_name => $form_field) {
            $update[] = '`' . $col_name . '` = \'' . $this->escape($form_field) . '\'';
        }
        $sql = "update $tb_name set" . implode(',', $update) . "where id in ($sid)";
        $result = $this->execute($sql);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete($tb_name, $id)
    {
        //          $sql = "delete from `$tb_name` where `id`='$id' ";
        $sql = "update`$tb_name` set status=99, updated_on = Now(), updated_by = " . $this->employeeid . " where `id`='$id' ";
        if ($this->execute($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    function deleteFinal($tb_name, $id)
    {
        //          $sql = "delete from `$tb_name` where `id`='$id' ";
        $sql = "delete from `$tb_name` where `id`='$id' ";
        if ($this->execute($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    function deleteFinalWhere($tb_name, $where)
    {
        //          $sql = "delete from `$tb_name` where `id`='$id' ";
        $sql = "delete from `$tb_name` where $where ";
        if ($this->execute($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    function insertid()
    {
        return mysqli_insert_id($this->con);
    }

    function total_rows($result)
    {
        $num = mysqli_num_rows($result);
        return $num;
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
        $log['ip'] = $_SERVER['REMOTE_ADDR'];
        $log['city'] = "";
        $log['added_by'] = $this->employeeid;
        $log['added_on'] = date("Y-m-d H:i:s");
        $log['updated_by'] = $this->employeeid;
        $log['updated_on'] = date("Y-m-d H:i:s");
        $log['status'] = "1";
        $this->insertnew("activitylog", $log);
    }

    function insert($tb_name, $tb_col_name, $form_field, $print = 0)
    {
        $tb_col_name1 = "`" . implode("`, `", $tb_col_name) . "`";
        $form_field1 = implode("', '", $form_field);
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

    /* cashfree */


    function searchstockapi($symbol, $exchtype, $expiry, $strike)
    {
        $headArry = array(
            'appName' => APP_NAME,
            'appVer' => APP_VERSION,
            'key' => KEY,
            'osName' => OS_NAME,
            'requestCode' => '5PMF',
            'userId' => USER_ID,
            'password' => PASSWORD,
        );

        $subArray = array(
            ["Exch" => "N", "ExchType" => $exchtype, "Symbol" => "$symbol", "Expiry" => $expiry, "StrikePrice" => $strike, "OptionType" => ""],
            ["Exch" => "B", "ExchType" => $exchtype, "Symbol" => "$symbol", "Expiry" => $expiry, "StrikePrice" => $strike, "OptionType" => ""],
        );

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
        $result = json_decode($result, true);
        curl_close($ch);
        return $result;
    }

    function searchstockapiwithtoken($symbol, $exchtype, $exch)
    {
        try {
            $accesstoken = $this->selectfieldwhere('token', 'accesstoken', 'status=1');
            $url = "https://Openapi.5paisa.com/VendorsAPI/Service1.svc/V1/MarketDepth";
            $authorization = "Bearer $accesstoken";
            $contentType = "application/json";

            $subArray = array(
                ["Exchange" => $exch, "ExchangeType" => $exchtype, "Symbol" => "$symbol"],
            );
            $data = array(
                "head" => array(
                    "key" => KEY
                ),
                "body" => array(
                    "ClientCode" => CLIENT_CODE,
                    "Count" => "1",
                    "Data" => $subArray
                )
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: " . $authorization,
                "Content-Type: " . $contentType
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $res = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($res, true);
            if (isset($response['body']['Data'])) {
                return $response['body']['Data'];
            } else {
                throw new Exception('Error fetching candle data:');
            }
        } catch (Exception $e) {
            // Log or handle the error as required
            return $e->getMessage();
        }
    }

    function marketstatus()
    {
        try {

            $accesstoken = $this->selectfieldwhere('token', 'accesstoken', 'status=1');
            $url = 'https://Openapi.5paisa.com/VendorsAPI/Service1.svc/MarketStatus';

            $headers = array(
                "Authorization: bearer $accesstoken",
                'Content-Type: application/json'
            );

            $data = array(
                'head' => array(
                    'key' => KEY
                ),
                'body' => array(
                    'ClientCode' => CLIENT_CODE
                )
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $res = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($res, true);
            if (isset($response['body']['Data'])) {
                return $response['body']['Data'];
            } else {
                throw new Exception('Error fetching:');
            }
        } catch (Exception $e) {
            // Log or handle the error as required
            return $e->getMessage();
        }
    }

    function getaccesstoken()
    {

        $url = 'https://Openapi.5paisa.com/VendorsAPI/Service1.svc/V1/GetAccessToken';
        $vendorKey = KEY;
        $requestToken = REQUEST_TOKEN;

        $data = array(
            'head' => array('key' => $vendorKey),
            'body' => array('RequestToken' => $requestToken)
        );

        $data_string = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'Cookie: 5paisacookie=fiuy51p0l4ttftse2o1oxt4t; NSC_JOh0em50e1pajl5b5jvyafempnkehc3=ffffffffaf103e0f45525d5f4f58455e445a4a423660'
            )
        );

        $response = curl_exec($ch);
        curl_close($ch);

        $res =  json_decode($response);
        // print_r($res);
        $atoken = $res->body->AccessToken;
        $pdate['accesstoken'] = $atoken;
        $pdate['status'] = 1;
        $pdate['added_on'] = date('Y-m-d H:i:s');
        $pdate['added_by'] = $this->employeeid;
        $pdate['updated_by'] = $this->employeeid;
        $pdate['updated_on'] = date('Y-m-d H:i:s');
        $pdate['userid'] = $this->employeeid;
        $pradin = $this->updatewhere("token", ['status' => 0], "status=1");
        if ($pradin) {
            if (!empty($pdate['accesstoken'])) {
                $pra = $this->insertnew("token", $pdate);
            }
            return $atoken;
        }
    }

    function getfullmarketdepth($symboldata)
    {
        try {
            $accesstoken = $this->selectfieldwhere('token', 'accesstoken', 'status=1');
            $url = "https://Openapi.5paisa.com/VendorsAPI/Service1.svc/V1/MarketDepth";
            $authorization = "Bearer $accesstoken";
            $contentType = "application/json";

            $data = array(
                "head" => array(
                    "key" => KEY
                ),
                "body" => array(
                    "ClientCode" => CLIENT_CODE,
                    "Count" => "1",
                    "Data" => $symboldata
                    // "Data" => array(
                    //     array(
                    //         "Exchange" => "N",
                    //         "ExchangeType" => "C",
                    //         "Symbol" => "RELIANCE"
                    //     ),
                    // )
                )
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: " . $authorization,
                "Content-Type: " . $contentType
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $res = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($res, true);
            if (isset($response['body']['Data'])) {
                return $response['body']['Data'];
            } else {
                throw new Exception('Error fetching candle data: ' . $response['Message']);
            }
        } catch (Exception $e) {
            // Log or handle the error as required
            return $e->getMessage();
        }
    }

    function getcandledata($scriptcode, $exch, $type, $interval, $startdate, $enddate)
    {
        try {
            $accesstoken = $this->selectfieldwhere('token', 'accesstoken', 'status=1');
            $url = 'https://openapi.5paisa.com/historical/' . $exch . '/' . $type . '/' . $scriptcode . '/' . $interval . '';
            $subscriptionKey = KEY;
            $clientCode = CLIENT_CODE;
            $accessToken = $accesstoken;
            $from = $startdate;
            $end = $enddate;

            $queryString = http_build_query(array('from' => $from, 'end' => $end));
            $url = $url . '?' . $queryString;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Ocp-Apim-Subscription-Key: ' . $subscriptionKey,
                    'x-clientcode: ' . $clientCode,
                    'x-auth-token: ' . $accessToken
                )
            );

            $res = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($res, true);
            if (isset($response['data'])) {
                return $response['data'];
            } else {
                throw new Exception('Error fetching candle data:');
            }
        } catch (Exception $e) {
            // Log or handle the error as required
            return $e->getMessage();
        }
    }

    function fivepaisaapi($userstock)
    {
        try {
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
            // echo "testing API";
            // print_r($result);
            $result = json_decode($result, true);
            if (isset($result['body']['Data'])) {
                return $result['body']['Data'];
            } else {
                throw new Exception('Error fetching candle data:');
            }
        } catch (Exception $e) {
            // Log or handle the error as required
            return $e->getMessage();
        }
    }


    function testapi()
    {
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, 'http://dummyjson.com/products/1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request and store the response
        $response = curl_exec($ch);
        print_r($response);
        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Output the API response
        echo $response;
    }

    function fivepaisaapi2($userstock)
    {
        try {
            $headArry = array(
                'appName' => APP_NAME,
                'appVer' => APP_VERSION,
                'key' => KEY,
                'osName' => OS_NAME,
                'requestCode' => '5PMF',
                'userId' => USER_ID,
                'password' => PASSWORD,
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
            if (isset($result['body']['Data'])) {
                return $result['body']['Data'];
            } else {
                throw new Exception('Error fetching candle data:');
            }
        } catch (Exception $e) {
            // Log or handle the error as required
            return $e->getMessage();
        }
    }

    function getsmartapitoken()
    {

        $clientId = 'M884428';
        $clientPin = '7471';
        $totpCode = '750063';
        $apiKey = 'e1L5mgQQ';

        $data = json_encode([
            "clientcode" => $clientId,
            "password" => $clientPin,
            "totp" => $totpCode
        ]);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://apiconnect.angelbroking.com/rest/auth/angelbroking/user/v1/loginByPassword');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array(
            'Content-Type: application/json',
            'Accept: application/json',
            'X-UserType: USER',
            'X-SourceID: WEB',
            'X-ClientLocalIP: CLIENT_LOCAL_IP',
            'X-ClientPublicIP: CLIENT_PUBLIC_IP',
            'X-MACAddress: MAC_ADDRESS',
            'X-PrivateKey: ' . $apiKey
        );

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }

        curl_close($ch);

        echo $response;
    }

    function fetchsmartapi()
    {
        $data = json_encode([
            "exchange" => "MCX",
            "tradingsymbol" => "SILVER",
            "symboltoken" => "250741"

        ]);
        $accesstoken = $this->selectfieldwhere('token', 'smartapitoken', 'status=1');
        // echo $accesstoken;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiconnect.angelbroking.com/order-service/rest/secure/angelbroking/order/v1/getLtpData',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $accesstoken",
                'Content-Type: application/json',
                'Accept: application/json',
                'X-UserType: USER',
                'X-SourceID: WEB',
                'X-ClientLocalIP: CLIENT_LOCAL_IP',
                'X-ClientPublicIP: CLIENT_PUBLIC_IP',
                'X-MACAddress: MAC_ADDRESS',
                'X-PrivateKey: e1L5mgQQ'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    function fetchsmartapi2()
    {
        $data = json_encode([
            "mode" => "LTP",
            "exchangeTokens" => [
                "NSE" => [
                    "5097",
                    "3045",
                ],
            ]
        ]);
        $accesstoken = $this->selectfieldwhere('token', 'smartapitoken', 'status=1');
        // echo $accesstoken;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiconnect.angelbroking.com/rest/secure/angelbroking/market/v1/quote/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $accesstoken",
                'Content-Type: application/json',
                'Accept: application/json',
                'X-UserType: USER',
                'X-SourceID: WEB',
                'X-ClientLocalIP: CLIENT_LOCAL_IP',
                'X-ClientPublicIP: CLIENT_PUBLIC_IP',
                'X-MACAddress: MAC_ADDRESS',
                'X-PrivateKey: e1L5mgQQ'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo "<pre>";
            print_r(json_decode($response));
        }
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

    /* Default db operation start */

    function login($tb_name, $email_p, $password_p, $email_name, $password_name)
    {
        session_start();
        $sql = "select * from $tb_name where $email_name='$email_p'";
        $result = $this->execute($sql);
        $row = $this->fetch_assoc($result);
        $data = $this->total_rows($result);
        if ($data > 0) {
            if ($row[$password_name] = md5($password_p)) {
                echo $logid = $row["id"];
                $_SESSION["userid"] = $logid;
                $_SESSION['username'] = $row['username'];
                header("location:login.php?msg=error_noerror");
            } else {
                header("location:login.php?msg=error_wrong");
            }
        } else {
            header("location:login.php?msg=error_nouser");
        }
    }

    function findmanager($userid)
    {
        $department = $this->selectfield('employeecompletion', 'department', 'userid', $userid);
        $result = $this->selectextrawhere('companystructure', "department=$department and parentid=0");
        $manager = array();
        while ($row = $this->fetch_assoc($result)) {
            $manager[] .= $row['id'];
        }
        $mgr = implode(",", $manager);
        $mngrs = array();
        $result1 = $this->selectextrawhere('employeecompletion', "postappointed in($mgr) and active=1");
        while ($rows = $this->fetch_assoc($result1)) {
            $mngrs[$rows['userid']] = $rows['email'];
        }
        return $mngrs;
    }

    function findmanagerid($userid)
    {
        $department = $this->selectfield('employeecompletion', 'department', 'userid', $userid);
        $result = $this->selectextrawhere('companystructure', "department=$department and parentid=0");
        $manager = array();
        while ($row = $this->fetch_assoc($result)) {
            $manager[] .= $row['id'];
        }
        $mgr = implode(",", $manager);
        $result1 = $this->selectextrawhere('employeecompletion', "postappointed in($mgr) and active=1");
        while ($rows = $this->fetch_assoc($result1)) {
            $mngrs[$rows['userid']] = $rows['userid'];
        }
        return $mngrs;
    }

    function findmanagerdepartment($departmentid)
    {
        $result = $this->selectextrawhere('companystructure', "department=$departmentid and parentid=0");
        // echo $result;
        $manager = array();
        while ($row = $this->fetch_assoc($result)) {
            $manager[] .= $row['id'];
            // echo $row['id'];
        }
        $mgr = implode(",", $manager);
        // echo $mgr."<br/>";
        $result1 = $this->selectextrawhere('employeecompletion', "postappointed in($mgr) and active=1");
        while ($rows = $this->fetch_assoc($result1)) {
            $mngrs[$rows['userid']] = $rows['userid'];
        }
        //print_r($mngrs);
        return $mngrs;
        //  return 1;
    }

    function alldepartmentheadid()
    {
        $result = $this->selectextrawhere('companystructure', " parentid=0");
        // echo $result;
        $manager = array();
        while ($row = $this->fetch_assoc($result)) {
            $manager[] .= $row['id'];
            // echo $row['id'];
        }
        $mgr = implode(",", $manager);
        // echo $mgr."<br/>";
        $result1 = $this->selectextrawhere('employeecompletion', "postappointed in($mgr) and active=1");
        while ($rows = $this->fetch_assoc($result1)) {
            $mngrs[$rows['userid']] = $rows['userid'];
        }
        //print_r($mngrs);
        return $mngrs;
    }

    function getEmployeeName($id)
    {
        $result = $this->selectextrawhere("user", " id=$id");
        $row = $this->fetch_assoc($result);
        return $row['name'] . "(" . $row['employeecode'] . ")";
    }

    /**
     * @return int
     */
    function getinsertData($tb_name, $postdata)
    {
        foreach ($postdata as $key => $value) {
            $tbl[$key] = $key;
            $postdata[$key] = $this->escape($value);
        }
        $tbl_coloumn_name = array(implode('`, `', $tbl));
        $tbl_data = array(implode("', '", $postdata));
        $tb_col_name1 = "`" . implode("`, `", $tbl_coloumn_name) . "`";
        $form_field1 = implode("', '", $tbl_data);
        $sql = "('$form_field1')";

        return $sql;
    }

    function approve($tb_name, $id)
    {
        $sql = "update `$tb_name` set status=1 where `id`='$id' ";
        if ($this->execute($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    function deletewhere($tb_name, $where, $print = 0)
    {
        $sql = "update`$tb_name` set status=99, updated_on = Now(), updated_by = " . $this->employeeid . " where $where";
        //        $sql = "delete from `$tb_name` where $where ";
        if ($this->execute($sql, $print)) {
            return 1;
        } else {
            return 0;
        }
    }

    function deletein($tb_name, $id)
    {
        $sql = "update`$tb_name` set status=99 where `id` in '$id' ";
        //        $sql = "delete from `$tb_name` where `id` in '$id' ";
        if ($this->execute($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    function deletefile($path)
    {
        if (file_exists($path)) {
            if (unlink($path)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    function search($tb_name, $tb_col_name)
    {
        $sql = "select * from $tb_name where $tb_col_name like '%" . $_POST["search"] . "%'";
        $result = $this->execute($sql);
        return $result;
    }

    function check_login()
    {
        if (isset($_COOKIE['userData'])) {
            $userData = json_decode($_COOKIE['userData'], true);
            // print_r($userData);
            // die;
            $_SESSION['username'] = $userData['username'];
            $_SESSION['userid'] = $userData['userid'];
            $_SESSION['useremail'] = $userData['useremail'];
            $_SESSION['role'] = $userData['role'];
            $_SESSION['type'] = $userData['type'];
            $_SESSION['name'] = $userData['name'];
        }
        if (isset($_SESSION['username']) && $_SESSION['type'] == 2) {
            $user = $_SESSION['username'];
            $head = "";

            if (($_SERVER['HTTP_HOST'] == 'localhost')) {
                $head = "/pmsequityNew";
            }
            if (str_contains($_SERVER['REQUEST_URI'], "$head/admin")) {
                if ($_SERVER['REQUEST_URI'] === "$head/admin") {
                    header('location:admin/adminlogin');
                } else {
                    header('location:adminlogin');
                }
            }
        } elseif (isset($_SESSION['username']) && $_SESSION['type'] == 1) {
            $head = "";
            // if ($_SERVER['REQUEST_URI'] !== '/pmsequityNew/admin/users') {
            //     echo $_SERVER['REQUEST_URI'];
            //     die;
            // }
            if (($_SERVER['HTTP_HOST'] == 'localhost')) {
                $head = "/pmsequityNew";
            }
            if (!str_contains($_SERVER['REQUEST_URI'], "$head/admin") && !str_contains($_SERVER['REQUEST_URI'], "$head/main/admin")) {
                header('location:login');
            }
        } else {
            $head = "";
            if (($_SERVER['HTTP_HOST'] == 'localhost')) {
                $head = "/pmsequityNew";
            }
            if (str_contains($_SERVER['REQUEST_URI'], "$head/admin")) {
                if ($_SERVER['REQUEST_URI'] === "$head/admin") {
                    header('location:admin/adminlogin');
                } else {
                    header('location:adminlogin');
                }
            } else {
                header('location:login');
            }
        }
    }

    function check_activate()
    {
        $activate = $this->selectfieldwhere("users", "activate", "id=" . $this->employeeid . "");
        if (!empty($activate) && $activate === 'No') {
            header("location:logout");
            $this->logout();
        }
    }

    function logout()
    {

        setcookie('userData', '', time() - 3600, '/');
        session_destroy();
    }

    function createCache($tablename)
    {
        $data = array();
        $result = $this->selecttable("$tablename");
        while ($row = $this->fetch_assoc($result)) {
            $data[$row['id']] = $row['description'];
        }

        $fp = fopen("cache/$tablename.json", 'w');
        fwrite($fp, json_encode($data));
        fclose($fp);
    }

    function uploadimage($path, $image, $name)
    {
        $imagename = "";
        // print_r($image);
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $image[$name]["name"]);
        $exte = end($temp);
        $extension = strtolower($exte);
        if (in_array($extension, $allowedExts)) {
            if (($image[$name]["size"] < 600000000)) {

                if ((($image[$name]["type"] == "image/gif") || ($image[$name]["type"] == "image/jpeg") || ($image[$name]["type"] == "image/jpg") || ($image[$name]["type"] == "image/pjpeg") || ($image[$name]["type"] == "image/x-png") || ($image[$name]["type"] == "image/png"))) {
                    if ($image[$name]["error"] > 0) {

                        return "Return Code: " . $image[$name]["error"] . "<br>";
                    } else {
                        $imgname = time() . chr(rand(65, 90)) . chr(rand(97, 122)) . chr(rand(65, 90)) . "." . $extension;
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                        }
                        if (file_exists($path . "/" . $image[$name]["name"])) {

                            $imagename = $path . "/" . $imgname;
                            if (move_uploaded_file($image["$name"]["tmp_name"], $imagename)) {
                                $x['filename'] = $imgname;
                                $x['orgname'] = $image[$name]["name"];
                                $x['uploadedby'] = $_SESSION['calitechemployee'];
                                $x['uploadedon'] = date("Y-m-d H:i:s");
                                $x['path'] = $imagename;
                                $x['status'] = 1;
                                $this->insertnew("uploadfile", $x);
                                return $imagename;
                            }
                        } else {
                            $imagename = $path . "/" . $imgname;
                            if (move_uploaded_file($image[$name]["tmp_name"], $imagename)) {
                                $x['filename'] = $imgname;
                                $x['orgname'] = $image[$name]["name"];
                                $x['uploadedby'] = $_SESSION['calitechemployee'];
                                $x['uploadedon'] = date("Y-m-d H:i:s");
                                $x['path'] = $imagename;
                                $x['status'] = 1;
                                print_r($x);
                                $this->insertnew("uploadfile", $x);
                                return $imagename;
                            }
                        }
                    }
                } else {
                    return " Invalid file Please Resave file";
                }
            } else {
                echo ' Invalid File gif,jpeg,png,jpg files allowed';
            }
        } else {
            echo ' Invalid File file size not more then 500MB';
        }
    }

    function uploadfilenew($path, $image, $name, $allowedext, $savename = "")
    {
        $imagename = "";
        // print_r($image);
        $allowedExts = $allowedext;
        $temp = explode(".", $image[$name]["name"]);
        $exte = end($temp);
        $extension = strtolower($exte);
        if (($image[$name]["size"] < 600000000)) {
            if (in_array($extension, $allowedExts)) {
                if ($image[$name]["error"] > 0) {
                    return "Return Code: " . $image[$name]["error"] . "<br>";
                } else {
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $imgname = $savename . "." . $extension;
                    if (empty($savename)) {
                        $imgname = time() . chr(rand(65, 90)) . chr(rand(97, 122)) . chr(rand(65, 90)) . "." . $extension;
                    }
                    if (file_exists($path . "/" . $image[$name]["name"])) {
                        $imagename = $path . "/" . $imgname;
                        echo move_uploaded_file($image["$name"]["tmp_name"], $imagename);
                        if (move_uploaded_file($image["$name"]["tmp_name"], $imagename)) {
                            $x['filename'] = $imgname;
                            $x['orgname'] = $image[$name]["name"];
                            $x['updated_by'] = $this->employeeid;
                            $x['updated_on'] = date("Y-m-d H:i:s");
                            $x['path'] = $imagename;
                            $x['status'] = 1;
                            //print_r($x);
                            $id = $this->insertnew("uploadfile", $x);
                            return $id;
                        }
                    } else {
                        $imagename = $path . "/" . $imgname;
                        if (move_uploaded_file($image[$name]["tmp_name"], $imagename)) {
                            $x['filename'] = $imgname;
                            $x['orgname'] = $image[$name]["name"];
                            $x['updated_by'] = $this->employeeid;
                            $x['updated_on'] = date("Y-m-d H:i:s");
                            $x['path'] = $imagename;
                            $x['status'] = 1;
                            $id = $this->insertnew("uploadfile", $x);
                            return $id;
                        }
                    }
                }
            } else {

                echo ' Invalid File gif,jpeg,png,jpg files allowed';
                return "Invalid File";
            }
        } else {
            echo ' Invalid File file size not more then 500MB';
            return "Invalid File";
        }
    }

    function uploadmultiple($path, $image, $name, $allowedext)
    {
        $imagename = "";
        // print_r($image);
        $allowedExts = $allowedext;
        $imagesarray = array();
        foreach ($image[$name]["tmp_name"] as $key => $tmp_name) {
            $temp = explode(".", $image[$name]["name"][$key]);
            $exte = end($temp);
            $extension = strtolower($exte);
            if (($image[$name]["size"][$key] < 600000000)) {
                if (in_array($extension, $allowedExts)) {
                    if ($image[$name]["error"][$key] > 0) {
                        return "Return Code: " . $image[$name]["error"][$key] . "<br>";
                    } else {
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                        }
                        $imgname = time() . chr(rand(65, 90)) . chr(rand(97, 122)) . chr(rand(65, 90)) . "." . $extension;
                        if (file_exists($path . "/" . $image[$name]["name"][$key])) {
                            $imagename = $path . "/" . $imgname;
                            if (move_uploaded_file($image["$name"]["tmp_name"][$key], $imagename)) {
                                $x['filename'] = $imgname;
                                $x['orgname'] = $image[$name]["name"][$key];
                                $x['uploadedby'] = $_SESSION['calitechemployee'];
                                $x['uploadedon'] = date("Y-m-d H:i:s");
                                $x['path'] = $imagename;
                                $x['status'] = 1;
                                $id = $this->insertnew("uploadfile", $x);
                                $imagesarray[] .= $id;
                            }
                        } else {
                            $imagename = $path . "/" . $imgname;
                            if (move_uploaded_file($image[$name]["tmp_name"][$key], $imagename)) {
                                $x['filename'] = $imgname;
                                $x['orgname'] = $image[$name]["name"][$key];
                                $x['updatedby'] = $_SESSION['calitechemployee'];
                                $x['updatedon'] = date("Y-m-d H:i:s");
                                $x['path'] = $imagename;
                                $x['status'] = 1;
                                $id = $this->insertnew("uploadfile", $x);
                                $imagesarray[] .= $id;
                            }
                        }
                    }
                } else {
                    echo ' Invalid File gif,jpeg,png,jpg files allowed';
                }
            } else {
                echo ' Invalid File file size not more then 500MB';
            }
        }
        return implode(",", $imagesarray);
    }

    function uploadfile($path, $image, $name, $allowedext)
    {
        $imagename = "";
        // print_r($image);
        $allowedExts = $allowedext;
        $temp = explode(".", $image[$name]["name"]);
        $exte = end($temp);
        $extension = strtolower($exte);
        if (($image[$name]["size"] < 600000000)) {
            if (in_array($extension, $allowedExts)) {
                if ($image[$name]["error"] > 0) {
                    return "Return Code: " . $image[$name]["error"] . "<br>";
                } else {
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $imgname = time() . chr(rand(65, 90)) . chr(rand(97, 122)) . chr(rand(65, 90)) . "." . $extension;
                    if (file_exists($path . "/" . $image[$name]["name"])) {
                        $imagename = $path . "/" . $imgname;
                        if (move_uploaded_file($image["$name"]["tmp_name"], $imagename)) {
                            $x['filename'] = $imgname;
                            $x['orgname'] = $image[$name]["name"];
                            $x['uploadedby'] = $_SESSION['calitechemployee'];
                            $x['uploadedon'] = date("Y-m-d H:i:s");
                            $x['path'] = $imagename;
                            $x['status'] = 1;
                            $id = $this->insertnew("uploadfile", $x);
                            return $imagename;
                        }
                    } else {
                        $imagename = $path . "/" . $imgname;
                        if (move_uploaded_file($image[$name]["tmp_name"], $imagename)) {
                            $x['filename'] = $imgname;
                            $x['orgname'] = $image[$name]["name"];
                            $x['uploadedby'] = $_SESSION['calitechemployee'];
                            $x['uploadedon'] = date("Y-m-d H:i:s");
                            $x['path'] = $imagename;
                            $x['status'] = 1;
                            $id = $this->insertnew("uploadfile", $x);
                            return $imagename;
                        }
                    }
                }
            } else {
                echo ' Invalid File gif,jpeg,png,jpg files allowed';
            }
        } else {
            echo ' Invalid File file size not more then 500MB';
        }
    }

    function uploadfilesame($path, $image, $name, $allowedext)
    {
        $imagename = "";
        // print_r($image);
        $allowedExts = $allowedext;
        $temp = explode(".", $image[$name]["name"]);
        $exte = end($temp);
        $extension = strtolower($exte);
        if (($image[$name]["size"] < 600000000)) {
            if (in_array($extension, $allowedExts)) {
                if ($image[$name]["error"] > 0) {
                    return "Return Code: " . $image[$name]["error"] . "<br>";
                } else {
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $imgname = time() . chr(rand(65, 90)) . chr(rand(97, 122)) . chr(rand(65, 90)) . "." . $extension;
                    if (file_exists($path . "/" . $image[$name]["name"])) {
                        $imagename = $path . "/" . $imgname;
                        if (move_uploaded_file($image["$name"]["tmp_name"], $imagename)) {
                            $x['filename'] = $imgname;
                            $x['orgname'] = $image[$name]["name"];
                            $x['uploadedby'] = $_SESSION['calitechemployee'];
                            $x['uploadedon'] = date("Y-m-d H:i:s");
                            $x['path'] = $imagename;
                            $x['status'] = 1;
                            $this->insertnew("uploadfile", $x);
                            return $imagename;
                        }
                    } else {
                        $imagename = $path . "/" . $imgname;
                        if (move_uploaded_file($image[$name]["tmp_name"], $imagename)) {
                            $x['filename'] = $imgname;
                            $x['orgname'] = $image[$name]["name"];
                            $x['uploadedby'] = $_SESSION['calitechemployee'];
                            $x['uploadedon'] = date("Y-m-d H:i:s");
                            $x['path'] = $imagename;
                            $x['status'] = 1;
                            $this->insertnew("uploadfile", $x);
                            return $imagename;
                        }
                    }
                }
            } else {
                echo ' Invalid File gif,jpeg,png,jpg files allowed';
            }
        } else {
            echo ' Invalid File file size not more then 500MB';
        }
    }

    function getdatafromurl($url, $fields)
    {
        //API URL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . "?" . $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //           $ch = curl_init($url."?".$fields);
        echo $output = curl_exec($ch);
        //Print error if any
        curl_close($ch);
        return $output;
    }

    function randomSiFloat($min, $max, $idno, $donedate, $duedate, $unitt, $p)
    {
        $sql2 = "select * from `mminstrument` where TRIM(idno) like '$idno'";
        $result2 = $this->execute($sql2);
        $row2 = $this->fetch_assoc($result2);
        $stndid = $row2['id'];
        $sql4 = "select * from `calibrationdetail` where `siid`='$stndid' and `donedate` <= '$donedate' and `duedate`>= '$donedate'";
        $result4 = $this->execute($sql4);
        $row4 = $this->fetch_assoc($result4);
        $calibrationid = $row4['id'];
        $p = intval($p);
        $sql9 = "select * from `matrix` where `calibrationid`='$calibrationid' and`siid`='$stndid' and (`unit` like '" . html_entity_decode($unitt) . "' or `unit` like '$unitt') and `instrangemin`<" . $p . " and `instrangemax`>" . $p;
        $result9 = $this->execute($sql9);
        $row9 = $this->fetch_assoc($result9);
        //    print_r($row9)?;
        $xlc = 0;
        $snum = array();
        if (isset($row9['leastcount'])) {
            $slcount = $row9['leastcount'];
            if ($slcount == 'NA') {
                $xlc = 1;
            } else {
                $snum = explode('.', $slcount);
                $xlc = 0;
                if (isset($snum[1])) {
                    $xlc = strlen($snum[1]);
                } else {
                    $xlc = 0;
                }
            }
        }
        return sprintf("%." . $xlc . "f", $min + mt_rand() / mt_getrandmax() * ($max - $min));
    }

    function SiFloat($idno, $donedate, $duedate, $unitt, $p, $value)
    {
        $result2 = $this->selectextrawhere('mm_material', "TRIM(idno) like '$idno'");
        $row2 = $this->fetch_assoc($result2);
        $stndid = $row2['id'];
        $result4 = $this->selectextrawhere('calibrationdetail', "`siid`='$stndid' and `donedate` <= '$donedate' and `duedate`>= '$donedate'");
        $row4 = $this->fetch_assoc($result4);
        $calibrationid = $row4['id'];
        $p = intval($p);
        //echo html_entity_decode($unitt);
        $result9 = $this->selectextrawhere('matrix', "`siid`='$stndid' and (`unit` like '" . html_entity_decode($unitt) . "' or `unit` like '$unitt') and `instrangemin`< $p  and `instrangemax`>$p");
        //    print_r($this->total_rows($result9));
        $row9 = $this->fetch_assoc($result9);
        $xlc = 0;
        $snum = array();
        //echo $row9['leastcount'];
        if (isset($row9['leastcount'])) {
            $slcount = $row9['leastcount'];
            if ($slcount == 'NA') {
                $xlc = 1;
            } else {
                $snum = explode('.', $slcount);
                $xlc = 0;
                if (isset($snum[1])) {
                    $xlc = strlen($snum[1]);
                } else {
                    $xlc = 0;
                }
            }
        }
        return sprintf("%." . $xlc . "f", round($value, $xlc));
    }
}
function changedateformate($dateString)
{
    if ((!empty($dateString)) && ($dateString != "00/00/0000")) {
        $myDateTime = DateTime::createFromFormat('d/m/Y', $dateString);
        //print_r($myDateTime);
        return $myDateTime->format('Y-m-d');
    } else {
        return "";
    }
}

function changedateformatespeci($dateString, $speci)
{

    if ((!empty($dateString)) && ($dateString != "0000-00-00") && ($dateString != "0000-00-00 00:00:00")) {
        $myDateTime = DateTime::createFromFormat($speci, $dateString);
        try {
            return $myDateTime->format('Y-m-d');
        } catch (Exception $e) {
            echo $dateString;
            return $dateString;
        }
    } else {
        return "";
    }
}

function changedateformatespecito($dateString, $speci, $to)
{
    //    echo $dateString;
    if ((!empty($dateString)) && ($dateString != "0000-00-00") && ($dateString != "0000-00-00 00:00:00")) {
        $myDateTime = DateTime::createFromFormat($speci, $dateString);
        if ($myDateTime) {
            $newdate = $myDateTime->format($to);
            //if($newdate!="30")
            return $newdate;
        } else {
            //                    return $myDateTime;
            return $dateString;
        }
    } else {
        return "";
    }
}

function getFinancialYear($today)
{
    //    $today = date("Y-m-d");
    $month = date("m", strtotime($today));
    $year = date("y", strtotime($today));
    $financialYear = "";
    if ($month < 4) {
        $financialYear = ($year - 1) . "-" . $year;
    } else {
        $financialYear = ($year) . "-" . ($year + 1);
    }
    return $financialYear;
}

function getfirstandlastday($today)
{
    $month = date("m", strtotime($today));
    $year = date("Y", strtotime($today));
    $startdate = "";
    $enddate = "";
    if ($month < 4) {
        $financialYear = ($year - 1) . "-" . $year;
        $startdate = ($year - 1) . "-04-01";
        $enddate = $year . "-03-31";
    } else {
        $financialYear = ($year) . "-" . ($year + 1);
        $startdate = $year . "-04-01";
        $enddate = ($year + 1) . "-03-31";
    }
    return array("startdate" => $startdate, "enddate" => $enddate);
}
