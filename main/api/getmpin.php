<?php
date_default_timezone_set('Asia/Kolkata');
ini_set('memory_limit', '-1');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header('Access-Control-Request-Headers: *');

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

date_default_timezone_set('Asia/Kolkata');
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
        mysqli_query($this->con, "CREATE TABLE IF NOT EXISTS `zquerylogs$da`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `query` text  NULL,
  `url` text  NULL,
  `added_by` int(255)  NULL,
  `added_on` datetime  NULL,
  `updated_by` int(255)  NULL,
  `updated_on` datetime  NULL,
  `status` int(11)  NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
        $sql1 = $this->escape($sql);
        $url = $_SERVER['REQUEST_URI'];
        $datetimenow = date("Y-m-d H:i:s");
        $sql2 = "insert into `zquerylogs$da`(query,url,added_by,added_on,updated_by,updated_on,status) values('$sql1','$url','$employeeid','$datetimenow','$employeeid','$datetimenow',1)";

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

    function notifysms($mobileno, $templateid, $message)
    {

        $url = "http://sms.mobinama.com/http-tokenkeyapi.php?authentic-key=3537657361766172693130301660801567&senderid=ESAREN&route=1&unicode=2&number=" . $mobileno . "&message=" . urlencode($message) . "&templateid=$templateid";
        // echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //           $ch = curl_init($url."?".$fields);
        echo $output = curl_exec($ch);
        //Print error if any
        curl_close($ch);
        return $output;
    }
    function fetchattachment($aid)
    {
        $ptname = "uploadfile";
        if ($aid != "" && $aid > 0) {
            $pwhere = "id=" . $aid;
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
// $method = $_SERVER['REQUEST_METHOD'];
// $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
// echo "dasda";
// die;
$data = json_decode(file_get_contents("php://input"), true);
$userid = $_GET['userid'];

$data['mpin'] = $obj->selectfieldwhere("users", "mpin", "id = '" . $userid . "'");
// run SQL statement

// die if SQL statement failed

$data['status'] = "200";
echo json_encode($data);
