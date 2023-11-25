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
$return['recordsTotal'] = $obj->selectfieldwhere("fundrequest $join ", "count(fundrequest.id)", "fundrequest.status in (0) ");
$return['recordsFiltered'] = $obj->selectfieldwhere("fundrequest $join", "count(fundrequest.id)", "fundrequest.status in (0) $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
  "fundrequest $join",
  "fundrequest.id,name,userid,users.mobile,fundrequest.added_on,fundrequest.status,amount,paymentmethod,transactionid,investmentamount",
  "fundrequest.status in (0) $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
  $n = array();
  $n[] = $i;
  $n[] = "<strong>" . $row['name'] . "</strong>";
  // $n[] = $row['mobile'];
  $n[] = $currencysymbol . $row['investmentamount'];
  // $n[] = $row['transactionid'];
  $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M,Y H:i");
  $n[] =  "<strong>" . $currencysymbol . $row['amount'] . "</strong>";
  // $n[] =  $row['remark'];
  $n[]  =  ' <a target="_blank"  href="../' . $obj->fetchattachment($row["paymentmethod"]) . '"><img style="height:200px;width:200px" src="../' . $obj->fetchattachment($row["paymentmethod"]) . '" /></a ';
  $appdata = "";
  if (in_array(37, $permissions)) {
    $appdata =  " <div class='dropdown'>
        <button class='btn dropdown-toggle align-text-top' data-bs-toggle='dropdown' fdprocessedid='eigo2i' aria-expanded='false'>
          Actions
        </button>
        <div class='dropdown-menu dropdown-menu-end'>
          <a class='dropdown-item'  onclick='fun1(\"" . $row['id'] . " \", \"approveinvestment\", \"resultid\",\"Approve\")'>
            Approve
          </a>
          <a class='dropdown-item' onclick='fun1(\"" . $row['id'] . " \", \"approveinvestment\", \"resultid\",\"Reject\")'>
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
