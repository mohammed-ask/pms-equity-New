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
$oary = array('roles.id', 'roles.name', 'roles.description', '');
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
    $search .= " and (roles.name like '%$sv%' or roles.description like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and roles.name like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and roles.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$return['recordsTotal'] = $obj->selectfieldwhere("roles  ", "count(roles.id)", "status=1 and id != 1 ");
$return['recordsFiltered'] = $obj->selectfieldwhere("roles ", "count(roles.id)", "status=1 and id != 1 $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "roles ",
    "`roles`.`name`, `roles`.`description`,`roles`.`id` ",
    "status=1 and id != 1 $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = $row['name'];
    // $n[] = $row['description'];
    $a = "";
    if (in_array(26, $permissions)) {
        $a = '<a style="margin-right: 10px !important;" class="btn font-medium leading-5 text-white  bg-blue  rounded-lg " href="editrole?hakuna=' . $row['id'] . '" >Edit</a>';
    }
    if (in_array(27, $permissions)) {
        // $a .= "<input type='button' class='px-4 py-2 ml-1 text-sm font-medium leading-5 text-white  bg-red  rounded-lg ' value='delete' onclick='del(\"" . $row['id'] . "\", \"deleterole\", \"Delete Role \")'/>";
        $a .= "<a style='cursor: pointer;' class='btn font-medium leading-5 text-white  bg-red  rounded-lg '  onclick='del(\"" . $row['id'] . "\", \"deleterole\", \"Delete Role \")' >Delete</a>";
    }
    $n[] = $a;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
