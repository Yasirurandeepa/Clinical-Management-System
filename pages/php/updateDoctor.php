<?php

require_once("../../php/dbOps/crud.php");
require_once("../../php/users/userTypes.php");

$id = $_POST['id'];
$medLicenceNo = $_POST['medLicenceNo'];
$speciality = $_POST['speciality'];

$crud = new Crud();

$query = "UPDATE doctor SET medLicenceNo='$medLicenceNo', speciality='$speciality' WHERE id='$id'";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>