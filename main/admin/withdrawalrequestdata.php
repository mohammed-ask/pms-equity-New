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
$join = "inner join users on users.id = withdrawalrequests.userid";
$return['recordsTotal'] = $obj->selectfieldwhere("withdrawalrequests $join", "count(withdrawalrequests.id)", "withdrawalrequests.status in (1,0,91) ");
$return['recordsFiltered'] = $obj->selectfieldwhere("withdrawalrequests $join", "count(withdrawalrequests.id)", "withdrawalrequests.status in (1,0,91)  $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "withdrawalrequests $join",
    "withdrawalrequests.id,name,investmentamount,mobile,amount,withdrawalrequests.status,remark,withdrawalrequests.added_on,userid",
    "withdrawalrequests.status in (1,0,91)  $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = $row['name'];
    $n[] = $row['mobile'];
    $n[] = round($row['investmentamount'], 2);
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = "₹" . $row['amount'];
    $n[] = $row['remark'];
    $n[] = match ($row['status']) {
        '0' => 'Pending',
        '1' => 'Approved',
        default => 'Rejected',
    };
    $n[] = "<div class='flex items-center space-x-4 text-sm'><button  class='btn' @click='openModal'  onclick='dynamicmodal(\"" . $row['userid'] . "\", \"viewbankdetails\", \"\", \"Client Bank Details\")'  aria-label='Go'>
    <span >Bank Detail</span>
</button></div>";
    $adddata = "";
    if ($row['status'] === '0' && in_array(42, $permissions)) {
        $adddata .= "<div class='dropdown'>
        <button class='btn dropdown-toggle align-text-top' data-bs-toggle='dropdown' fdprocessedid='eigo2i' aria-expanded='false'>
          Actions
        </button>
        <div class='dropdown-menu dropdown-menu-end'>
          <a class='dropdown-item' onclick='fun1(\"" . $row['id'] . " \", \"approvewithdrawalreq\", \"resultid\",\"Approve\")'>
            Approve
          </a>
          <a class='dropdown-item' onclick='fun1(\"" . $row['id'] . " \", \"approvewithdrawalreq\", \"resultid\",\"Reject\"'>
            Disapprove
          </a>
        </div>
      </div>";
    };
    $n[] = $adddata;
    $data[] = $n;

    $i++;
}
$return['data'] = $data;
echo json_encode($return);






