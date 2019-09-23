<?php

require_once("../php/dbOps/crud.php");
require_once("../php/users/userTypes.php");

session_start();
$id ='' ;
$type = '';
if(array_key_exists('logged_id',$_SESSION) && !empty($_SESSION['logged_id']) && array_key_exists('logged_type',$_SESSION) && !empty($_SESSION['logged_type'])) {
    $id = $_SESSION["logged_id"];
    $type = $_SESSION["logged_type"];
}else{
    header('Location: ../index.php');
}


$loggedResponse = null;
$query = '';

switch ($type) {
    case $PATIENT_TYPE:
        $query = "SELECT * FROM user NATURAL RIGHT OUTER JOIN patient WHERE id='$id'";
        break;
    case $DOCTOR_TYPE:
        $query = "SELECT * FROM user NATURAL RIGHT OUTER JOIN doctor WHERE id='$id'";
        break;
    case $STAFF_TYPE:
        $query = "SELECT * FROM user WHERE id='$id'";
        break;
    case $ADMIN_TYPE:
        $query = "SELECT * FROM user WHERE id='$id'";
        break;
}

$crud = new Crud();
$loginResponse = $crud->getData($query);

?>