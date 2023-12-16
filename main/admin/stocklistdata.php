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
$oary = array('listedstocks.id', 'listedstocks.Symbol', 'listedstocks.expiredate', '');
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
    $search .= " and (listedstocks.Symbol like '%$sv%' or listedstocks.expiredate like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and listedstocks.Symbol like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and listedstocks.expiredate like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$return['recordsTotal'] = $obj->selectfieldwhere("listedstocks  ", "count(listedstocks.id)", "status=1  ");
$return['recordsFiltered'] = $obj->selectfieldwhere("listedstocks ", "count(listedstocks.id)", "status=1  $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "listedstocks ",
    "`listedstocks`.`Symbol`, `listedstocks`.`expiredate`,`listedstocks`.`id` ",
    "status=1 and type = 'Derivative' $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = $row['Symbol'];
    $n[] = $row['expiredate'];
    $a = "";
    // if (in_array(26, $permissions)) {
    //     // $a = '<a style="margin-right: 10px !important;" class="btn font-medium leading-5 text-white  bg-blue  rounded-lg " href="editrole?hakuna=' . $row['id'] . '" >Edit</a>';
    // }
    if (in_array(47, $permissions)) {
        $a .= "<a style='cursor: pointer;' class='btn font-medium leading-5 text-white  bg-red  rounded-lg '  onclick='del(\"" . $row['id'] . "\", \"deletestock\", \"Delete Stock \")' >Delete</a>";
    }
    $n[] = $a;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
