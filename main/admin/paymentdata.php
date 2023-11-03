<?php
include '../session.php';
/* @var $obj db */
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
$oary = array('users.id', 'users.name', 'users.email', 'users.mobile', 'users.panno', 'users.dob', 'users.address', 'users.bankname', 'users.accountno', 'users.ifsc', 'users.password', 'users.cost', 'users.investmentamount');
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
    $search .= " and (users.name like '%$sv%' or users.email like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and users.name like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and users.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$join = "inner join subscribers on subscribers.paymentid = fundrequest.id ";
$join .= "inner join plandetail on plandetail.id = subscribers.plandetailid ";
$join .= "inner join plan on plan.id = plandetail.planid ";
$join .= "inner join plantypes on plantypes.id = plandetail.plantypeid ";
$join .= "inner join users on users.id = fundrequest.userid ";
$return['recordsTotal'] = $obj->selectfieldwhere("fundrequest $join ", "count(fundrequest.id)", "subscribers.status in (1,0) ");
$return['recordsFiltered'] = $obj->selectfieldwhere("fundrequest $join", "count(fundrequest.id)", "subscribers.status in (1,0) $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "fundrequest $join",
    "fundrequest.id,plan.name as pname,plantypes.name as ptname,users.name,subscribers.expireon,users.mobile,fundrequest.added_on,subscribers.status,amount,paymentmethod,transactionid,investmentamount",
    "subscribers.status in (1,0) $search $order"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M, Y");
    $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i a");
    $n[] = "<strong>" . $row['name'] . "</strong>";
    $n[] = $row['pname'];
    $n[] = $row['ptname'];
    $n[] = changedateformatespecito($row['expireon'], "Y-m-d", "d M, Y");
    $date1 = new DateTime();
    $date2 = new DateTime($row['expireon']);
    $interval = $date1->diff($date2);
    $days = $interval->days;
    $months = $interval->m;
    $years = $interval->y;
    $n[] = $days . ' Days';
    $n[] =  $row['status'] == 1 ? '<span class="badge bg-success me-1"></span> Active' : '<span class="badge bg-danger me-1"></span> Expired';
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
