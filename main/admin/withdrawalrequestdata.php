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
    $n[] = "<div class='flex items-center space-x-4 text-sm'><button  class='flex items-center justify-between px-2 py-2 bg-theme-color text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray' @click='openModal'  onclick='dynamicmodal(\"" . $row['userid'] . "\", \"viewbankdetails\", \"\", \"Client Bank Details\")'  aria-label='Go'>
    <span >Bank Detail</span>
</button></div>";
    $adddata = "";
    if ($row['status'] === '0' && in_array(42, $permissions)) {
        $adddata .= "<div class='tr'><div style='text-align:center;cursor:pointer'  class='showbox'>
    <img class='object-cover w-5 h-5' style='height:30px;width:30px;;margin:auto' src='../main/images/menu.png' alt='' aria-hidden='true' /></div>
        <div class='showbtn' style='display:none'>
        <ul >
                <li style='background-color:rgb(115, 214, 115) ; border-radius: 5px;margin-bottom:5px' class='flex'>
                    <a class='inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200' onclick='fun1(\"" . $row['id'] . " \", \"approvewithdrawalreq\", \"resultid\",\"Approve\")'>

                        <span class='w-4 h-4 mr-3' aria-hidden='true' fill='none' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' viewBox='0 0 24 24' stroke='currentColor'><i style='color:black;' class='fa-solid fa-circle-check'></i></span>
                        <button style='color: black;'>Approve</button>
                    </a>
                </li>

                <li style='background-color:#eb8a88 ; border-radius: 5px;' class='flex'>
                    <a class='inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200' onclick='fun1(\"" . $row['id'] . " \", \"approvewithdrawalreq\", \"resultid\",\"Reject\")'>
                        <span class='w-4 h-4 mr-3' aria-hidden='true' fill='none' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' viewBox='0 0 24 24' stroke='currentColor'><i style='color:black;' class='fa-solid fa-circle-xmark'></i></span>
                        <button style='color: black;'>Disapprove</button>
                    </a>
                </li>
        </ul></div></div>";
    };
    $n[] = $adddata;
    $data[] = $n;

    $i++;
}
$return['data'] = $data;
echo json_encode($return);
