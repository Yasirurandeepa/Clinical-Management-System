<?php
require_once("../../php/dbOps/crud.php");
$crud = new Crud();
$doctor_id = $_GET['schedule_id'];
$query = "SELECT COUNT(schedule_id) as schedule_count FROM appointment where schedule_id = '$doctor_id' ";
$scheduleCount = $crud -> getData($query);

if($scheduleCount){
    echo json_encode($scheduleCount);
}else{
    echo false;
}
?>