<?php
require_once("../../php/dbOps/crud.php");
$crud = new Crud();
$schedule_id = $_GET['schedule_id'];
$query = "SELECT *,appointment.id AS app_id FROM appointment LEFT OUTER JOIN user ON appointment.patient_id=user.id WHERE schedule_id='$schedule_id' ORDER By appointment.appointment_no";
$appointmentResponse = $crud -> getData($query);

if($appointmentResponse){
    echo json_encode($appointmentResponse);
}else{
    echo false;
}
?>