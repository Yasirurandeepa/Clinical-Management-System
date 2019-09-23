<?php
require_once("../../php/dbOps/crud.php");
$crud = new Crud();
$query = "SELECT *,doctor_schedules.id as schedule_id FROM doctor_schedules LEFT OUTER JOIN user ON doctor_schedules.doctor_id = user.id";
$scheduleResponse = $crud -> getData($query);

if($scheduleResponse){
    echo json_encode($scheduleResponse);
}else{
    echo false;
}
?>