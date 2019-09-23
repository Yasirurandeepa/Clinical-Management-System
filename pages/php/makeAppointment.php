<?php

require_once("../../php/dbOps/crud.php");

$app_no = $_POST['app_no'];
$schedule_id = $_POST['schedule_id'];
$patient_id = $_POST['patient_id'];

$crud = new Crud();

$query = "INSERT INTO appointment(schedule_id, patient_id, appointment_no) VALUES ('$schedule_id','$patient_id','$app_no')";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>