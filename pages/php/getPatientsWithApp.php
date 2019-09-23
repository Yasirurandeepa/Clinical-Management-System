<?php
require_once("../php/dbOps/crud.php");
require_once("loginDataFetching.php");
$crud = new Crud();
$doctor_id = $loginResponse[0]['id'];
$query = "SELECT * FROM user NATURAL RIGHT OUTER JOIN patient WHERE patient.id IN (SELECT appointment.patient_id FROM appointment RIGHT OUTER JOIN doctor_schedules ON appointment.schedule_id = doctor_schedules.id WHERE doctor_schedules.doctor_id = '$doctor_id')";
$dbResponse = $crud -> getData($query);
?>