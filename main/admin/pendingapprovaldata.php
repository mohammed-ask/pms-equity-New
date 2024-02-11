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
    $n[] =  "<p class='m-0' style='font-weight: 500; color: #e89f12;' aria-label='view'>
    <span>Pending</span>
</p>";
    $n[] =  "<button class='btn' data-bs-toggle='modal' data-bs-target='#modal-report'  onclick='dynamicmodal(\"" . $row['id'] . "\", \"viewusermodal\", \"\", \"User Details\")' aria-label='Edit'>More Detail</button>";
    if (in_array(44, $permissions)) {
        $n[] = "<button class='btn' data-bs-toggle='modal' data-bs-target='#modal-report'  onclick='dynamicmodal(\"" . $row['id'] . "\", \"userdocs\", \"\", \"Customer Documents\")' aria-label='Edit'>
    View Docs</button>";
    } else {
        $n[] = "";
    }
    $appdata = "";
    if (in_array(36, $permissions)) {
        $appdata = "<div class='dropdown'>
        <button class='btn dropdown-toggle align-text-top' data-bs-toggle='dropdown' fdprocessedid='eigo2i' aria-expanded='false'>
          Actions
        </button>
        <div class='dropdown-menu dropdown-menu-end'>
          <a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#'  onclick='fun1(\"" . $row['id'] . " \", \"approveuser\", \"resultid\",\"Approve\")'>
            Approve
          </a>
          <a class='dropdown-item' onclick='fun1(\"" . $row['id'] . " \", \"approveuser\", \"resultid\",\"Reject\")'>
            Disapprove
          </a>
        </div>
      </div>";
    }
    $n[] = $appdata;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
