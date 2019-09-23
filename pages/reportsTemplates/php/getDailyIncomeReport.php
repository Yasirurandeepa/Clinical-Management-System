<?php
require_once("../../../php/dbOps/crud.php");
require_once("../../../php/users/userTypes.php");
$crud = new Crud();
$query = "SELECT DATE(createdDate) AS date,SUM(value) AS income FROM payments GROUP BY DATE(payments.createdDate)";
$paymentResponse = $crud -> getData($query);
if($paymentResponse){
    echo json_encode($paymentResponse);
}else{
    echo false;
}
?>