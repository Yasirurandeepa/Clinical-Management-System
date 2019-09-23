<?php

require_once("../../php/dbOps/crud.php");

$doctor_id = $_POST['doctor_id'];
$patient_id = $_POST['patient_id'];
$description = $_POST['description'];

$crud = new Crud();

$query = "INSERT INTO diagnosis_details(doctor_id, patient_id, description) VALUES ('$doctor_id','$patient_id','$description')";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>