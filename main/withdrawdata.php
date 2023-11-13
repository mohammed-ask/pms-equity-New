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
$oary = array('withdrawalrequests.id', 'withdrawalrequests.userid',  'withdrawalrequests.remark', 'withdrawalrequests.amount');
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
    $search .= " and (withdrawalrequests.userid like '%$sv%' or withdrawalrequests.mobile like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and withdrawalrequests.userid like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and withdrawalrequests.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$return['recordsTotal'] = $obj->selectfieldwhere("withdrawalrequests", "count(withdrawalrequests.id)", "status in (0,1) and userid = $employeeid");
$return['recordsFiltered'] = $obj->selectfieldwhere("withdrawalrequests", "count(withdrawalrequests.id)", "status in (0,1) and userid = $employeeid $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "withdrawalrequests",
    "*",
    "status in (0,1) and userid = $employeeid $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    // $n[] = $i;
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M, Y H:i");
    // $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M, Y H:i");
    // $n[] = 'TR ID';
    $n[] = $row['amount'];
    $n[] = $row['status'] === '0' ? '<strong class="btn-sm py-0 btn btn-outline-warning">Processing</strong>' : '<strong class="btn-sm py-0 btn btn-outline-success">Settled</strong>';
    $data[] = $n;

    $i++;
}
$return['data'] = $data;
echo json_encode($return);
