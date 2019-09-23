<?php
require_once("../../php/dbOps/crud.php");
$crud = new Crud();
$doctor_id = $_GET['doctor_id'];
$query = "SELECT * FROM doctor_schedules  WHERE doctor_id='$doctor_id'";
$scheduleResponse = $crud -> getData($query);

if($scheduleResponse){
    echo json_encode($scheduleResponse);
}else{
    echo false;
}
?>