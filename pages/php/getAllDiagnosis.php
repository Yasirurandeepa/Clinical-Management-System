<?php
require_once("../../php/dbOps/crud.php");

$patient_id = $_GET['patient_id'];

$crud = new Crud();
$query = "SELECT * FROM user RIGHT OUTER JOIN diagnosis_details ON user.id = diagnosis_details.doctor_id WHERE patient_id='$patient_id'";
$diagnosisResponse = $crud -> getData($query);

if($diagnosisResponse) {
    echo json_encode(array_reverse($diagnosisResponse));
}else{
    echo json_encode(false);

}

?>