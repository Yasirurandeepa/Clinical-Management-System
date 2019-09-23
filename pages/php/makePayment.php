<?php
require_once("../../php/dbOps/crud.php");
$crud = new Crud();

$payment = $_POST['payment'];
$appointment_id = $_POST['app_id'];

$query = "INSERT INTO payments(value, appointment_id) VALUES ('$payment','$appointment_id')";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>