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
$oary = array('aitraders.id', 'aitraders.added_on', 'aitraders.userid');
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
    $search .= " and (aitraders.added_on like '%$sv%' or aitraders.userid like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and aitraders.added_on like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and aitraders.userid like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$join = "inner join users on users.id = aitraders.userid";
$return['recordsTotal'] = $obj->selectfieldwhere("aitraders $join", "count(aitraders.id)", "aitraders.status=1 ");
$return['recordsFiltered'] = $obj->selectfieldwhere("aitraders $join", "count(aitraders.id)", "aitraders.status=1  $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "aitraders $join",
    "`aitraders`.`added_on`, `aitraders`.`userid`,`users`.`name`,`users`.`mobile`,`users`.`email`,`aitraders`.`id`,`aitraders`.`aifund`,`aitraders`.`riskprct`,`aitraders`.`tradedone` ",
    "aitraders.status=1  $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $row['name'];
    $n[] = $row['tradedone'] === 'No' ? 'Pending' : 'Completed';
    $n[] = $row['mobile'];
    $n[] = $row['email'];
    $n[] = $row['aifund'];
    $n[] = $row['riskprct'] . '%';
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d/m/Y H:i:s");
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
