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
$return['recordsTotal'] = $obj->selectfieldwhere("users  ", "count(users.id)", "status in (0) and type = 2");
$return['recordsFiltered'] = $obj->selectfieldwhere("users ", "count(users.id)", "status in (0) and type = 2 $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "users ",
    "*",
    "status in (0) and type = 2 $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = $row['name'];
    $n[] = $row['email'];
    $n[] =  $row['mobile'];
    $n[] =  "<button class='px-4 py-2 leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700' aria-label='view'>
    <span class='w-5 h-5' fill='currentColor'>Pending</span>
</button>";
    $n[] =  "<button class='flex items-center justify-between px-3 py-1 bg-purple text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray' @click='openModal'  onclick='dynamicmodal(\"" . $row['id'] . "\", \"viewusermodal\", \"\", \"User Details\")' aria-label='Edit'>More Detail</button>";
    if (in_array(44, $permissions)) {
        $n[] = "<button class='px-3 py-1  text-sm  bg-blue  rounded-sm ' @click='openModal'  onclick='dynamicmodal(\"" . $row['id'] . "\", \"userdocs\", \"\", \"Customer Documents\")' aria-label='Edit'>
    View Docs</button>";
    } else {
        $n[] = "";
    }
    $appdata = "";
    if (in_array(36, $permissions)) {
        $appdata = "<div class='tr'><div style='text-align:center;cursor:pointer'  class='showbox'>
    <img class='object-cover w-5 h-5' style='height:30px;width:30px;;margin:auto' src='../main/images/menu.png' alt='' aria-hidden='true' /></div>
        <div class='showbtn' style='display:none'>
        <ul >
                <li style='background-color:rgb(115, 214, 115) ; border-radius: 5px;margin-bottom:5px' class='flex'>
                    <a class='inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200' onclick='fun1(\"" . $row['id'] . " \", \"approveuser\", \"resultid\",\"Approve\")'>

                        <span class='w-4 h-4 mr-3' aria-hidden='true' fill='none' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' viewBox='0 0 24 24' stroke='currentColor'><i style='color:black;' class='fa-solid fa-circle-check'></i></span>
                        <button style='color: black;'>Approve</button>
                    </a>
                </li>

                <li style='background-color:#eb8a88 ; border-radius: 5px;' class='flex'>
                    <a class='inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200' onclick='fun1(\"" . $row['id'] . " \", \"approveuser\", \"resultid\",\"Reject\")'>
                        <span class='w-4 h-4 mr-3' aria-hidden='true' fill='none' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' viewBox='0 0 24 24' stroke='currentColor'><i style='color:black;' class='fa-solid fa-circle-xmark'></i></span>
                        <button style='color: black;'>Disapprove</button>
                    </a>
                </li>
        </ul></div></div>";
    }
    $n[] = $appdata;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
