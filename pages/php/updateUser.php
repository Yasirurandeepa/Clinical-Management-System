<?php

require_once("../../php/dbOps/crud.php");
require_once("../../php/users/userTypes.php");

$id = $_POST['id'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$street = $_POST['street'];
$zipCode = $_POST['zipCode'];
$city = $_POST['city'];
$country = $_POST['country'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

$crud = new Crud();

$query = "UPDATE user SET fname='$fname', sname='$sname', street='$street',zipCode='$zipCode',city='$city',country='$country',telephone='$telephone', email='$email' WHERE id='$id'";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>