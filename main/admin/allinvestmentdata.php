<?php
include '../session.php';
/* @var $obj db */
$empref = "";
if (!in_array(45, $permissions)) {
    $emprefid = $obj->selectfieldwhere('users', "usercode", "id=$employeeid");
    $empref =  "and employeeref = '$emprefid'";
}
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
$oary = array('fundrequest.id', 'users.name', 'users.email', 'users.mobile', 'users.panno', 'users.dob', 'users.address', 'users.bankname', 'users.accountno', 'users.ifsc', 'users.password', 'users.cost', 'users.investmentamount');
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
$return['recordsTotal'] = $obj->selectfieldwhere("fundrequest $join ", "count(fundrequest.id)", "fundrequest.status in (0,1,91) $empref ");
$return['recordsFiltered'] = $obj->selectfieldwhere("fundrequest $join", "count(fundrequest.id)", "fundrequest.status in (0,1,91) $empref $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "fundrequest $join",
    "name,userid,users.mobile,fundrequest.added_on,fundrequest.status,amount,paymentmethod,transactionid",
    "fundrequest.status in (0,1,91) $empref $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = "<strong>" . $row['name'] . "</strong>";
    // $n[] = $row['mobile'];
    // $n[] = $row['transactionid'];
    $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M,Y H:i");
    $n[] =  "<strong>" . $currencysymbol . $row['amount'] . "</strong>";
    // $n[] =  $row['remark'];
    // $n[] =  $row['paymentmethod'];
    $n[] = "<button style='font-size: 12px; padding: 5px 11px;' class='btn' data-bs-toggle='modal' data-bs-target='#modal-report'  onclick='dynamicmodal(\"" . $row['paymentmethod'] . "\", \"showscreenshot\", \"\", \"\")'  aria-label='Go'>
    <span>Show Screenshot</span>
</button>";
    if ($row['status'] == 0) {
        $n[] =    "<button style='border: none; background-color: #fffdf0; border-radius: 5px; padding: 3px 10px; font-weight: 600; color: #d3b803;' aria-label='view'>
        <span class='w-5 h-5' fill='currentColor'>Pending</span>
    </button>";
    } elseif ($row['status'] == 1 && in_array(37, $permissions)) {
        $n[] =    "<button style='border: none; background-color: #f0fff6; border-radius: 5px; padding: 3px 10px; font-weight: 600; color:#1cbe01;' aria-label='view'>
        <span class='w-5 h-5' fill='currentColor'>Approved</span>
    </button>";
    } elseif ($row['status'] == 91 && in_array(37, $permissions)) {
        $n[] =    "<button style='border: none; background-color: #ffe7e7; border-radius: 5px; padding: 3px 10px; font-weight: 600; color: #f10101;' aria-label='view'>
        <span class='w-5 h-5' fill='currentColor'>Rejected</span>
    </button>";
    } else {
        $n[] = "";
    }
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
