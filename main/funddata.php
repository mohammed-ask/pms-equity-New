<?php
include 'session.php';
/* @var $obj db */
$id = $employeeid;
$limit = $_GET['length'];
$start = $_GET['start'];
$i = 1;
$return['recordsTotal'] = 0;
$return['recordsFiltered'] = 0;
$return['draw'] = $_GET['draw'];
$return['data'] = array();
$orderdirection = "";
if (isset($_GET['order'][0]['dir'])) {
    $orderdirection = $_GET['order'][0]['dir'];
}
$oary = array('fundrequest.id', 'fundrequest.userid', 'fundrequest.mobile', 'fundrequest.transactionid', 'fundrequest.paymentmethod');
$ocoloum = "";
if (isset($_GET['order'][0]['column'])) {
    $ci = $_GET['order'][0]['column'];
    $ocoloum = $oary[$ci];
}
$order = "";
if (!empty($ocoloum)) {
    $order = " order by $ocoloum $orderdirection ";
}
$search = "";
if (isset($_GET['search']['value']) && !empty($_GET['search']['value'])) {
    $sv = $_GET['search']['value'];
    $search .= " and (fundrequest.userid like '%$sv%' or fundrequest.mobile like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and fundrequest.userid like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and fundrequest.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$return['recordsTotal'] = $obj->selectfieldwhere("fundrequest", "count(fundrequest.id)", "status in (0,1) and userid = $employeeid");
$return['recordsFiltered'] = $obj->selectfieldwhere("fundrequest", "count(fundrequest.id)", "status in (0,1) and userid = $employeeid $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "fundrequest",
    "*",
    "status in (0,1) and userid = $employeeid $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    // $n[] = $i;
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M, Y");
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i");
    $n[] = $row['amount'];
    $n[] = $row['transactionid'];
    $n[] = $row['paymentmethod'];
   
    $n[] = $row['status'] === '0' ? '<strong class="text-warning">Pending</strong>' : '<strong class="text-success">Successful</strong>';
    $data[] = $n;

    $i++;
}
$return['data'] = $data;
echo json_encode($return);
