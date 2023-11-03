<?php
include "main/session.php";
$price = $obj->stockpricedata('INFY');
// $name = $obj->stockdata();
echo "<pre>";
print_r(var_dump($price));
// print_r($name);
