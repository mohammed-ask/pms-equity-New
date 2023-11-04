<?php
include "./session.php";
$something = $_POST["search"];
$product = $obj->selectextrawhereupdate("listedstocks", "Symbol,id", "status = 0 and Symbol like '%" . $something . "%'");
$response = array();

while ($row = $obj->fetch_assoc($product)) {
    $response[] = array(
        'value' => $row['Symbol'],
        "label" => $row['Symbol'],
        "data" => $row['Symbol']
    );
}
echo json_encode($response);
