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
$join = "inner join users on users.id = fundrequest.userid";
$return['recordsTotal'] = $obj->selectfieldwhere("fundrequest $join ", "count(fundrequest.id)", "fundrequest.status in (0,1,91) ");
$return['recordsFiltered'] = $obj->selectfieldwhere("fundrequest $join", "count(fundrequest.id)", "fundrequest.status in (0,1,91) $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "fundrequest $join",
    "name,userid,users.mobile,fundrequest.added_on,fundrequest.status,amount,paymentmethod,transactionid",
    "fundrequest.status in (0,1,91) $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = "<strong>" . $row['name'] . "</strong>";
    $n[] = $row['mobile'];
    $n[] = $row['transactionid'];
    $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M,Y H:i");
    $n[] =  "<strong>" . $currencysymbol . $row['amount'] . "</strong>";
    // $n[] =  $row['remark'];
    $n[] =  $row['paymentmethod'];
    //     if ($row['status'] == 0) {
    //         $n[] =    "<button class='px-4 py-2 leading-tight text-red-700 bg-red-100 rounded-full dark:text-yellow-100 dark:bg-red-700' aria-label='view'>
    //     <span class='w-5 h-5' fill='currentColor'>Pending</span>
    // </button>";
    //     } elseif ($row['status'] == 1 && in_array(37, $permissions)) {
    //         $n[] =    "<button class='px-4 py-2 leading-tight text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-red-700' aria-label='view'>
    //     <span class='w-5 h-5' fill='currentColor'>Approved</span>
    // </button>";
    //     } elseif ($row['status'] == 91 && in_array(37, $permissions)) {
    //         $n[] =    "<button class='px-4 py-2 leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700' aria-label='view'>
    //     <span class='w-5 h-5' fill='currentColor'>Rejected</span>
    // </button>";
    //     } else {
    //         $n[] = "";
    //     }
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
