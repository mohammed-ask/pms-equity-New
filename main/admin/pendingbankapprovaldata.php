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
$oary = array('bankaccountchange.id', 'bankaccountchange.userid', 'bankaccountchange.accountno', 'bankaccountchange.ifsc', 'bankaccountchange.added_on');
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
    $search .= " and (bankaccountchange.userid like '%$sv%' or bankaccountchange.bankname like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and bankaccountchange.userid like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and bankaccountchange.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$return['recordsTotal'] = $obj->selectfieldwhere("bankaccountchange  ", "count(bankaccountchange.id)", "status in (0)");
$return['recordsFiltered'] = $obj->selectfieldwhere("bankaccountchange ", "count(bankaccountchange.id)", "status in (0) $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "bankaccountchange ",
    "*",
    "status in (0) $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = $obj->selectfieldwhere("users", "name", "id=" . $row['userid'] . "");
    $n[] = $row['bankname'];
    $n[] =  $row['accountno'];
    $n[] =  $row['ifsc'];
    $n[] =  "<button class='btn' aria-label='view'>
    <span>Pending</span>
</button>";
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M, Y H:i");
    $appdata = "";
    if (in_array(36, $permissions)) {
        $appdata = "<div class='dropdown'>
        <button class='btn dropdown-toggle align-text-top' data-bs-toggle='dropdown' fdprocessedid='eigo2i' aria-expanded='false'>
          Actions
        </button>
        <div class='dropdown-menu dropdown-menu-end'>
          <a class='dropdown-item'  onclick='fun1(\"" . $row['id'] . " \", \"approvebank\", \"resultid\",\"Approve\")'>
            Approve
          </a>
          <a class='dropdown-item' onclick='fun1(\"" . $row['id'] . " \", \"approvebank\", \"resultid\",\"Reject\")'>
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



