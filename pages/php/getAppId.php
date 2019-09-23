<?php
require_once("../../php/dbOps/crud.php");
$crud = new Crud();

$sch_id = $_GET['schedule_id'];
$app_no = $_GET['appointment_no'];

$query = "SELECT id FROM appointment WHERE schedule_id='$sch_id' AND appointment_no='$app_no'";
$appointment_id = $crud -> getData($query);

if($appointment_id){
    echo json_encode($appointment_id);
}else{
    echo false;
}
?>