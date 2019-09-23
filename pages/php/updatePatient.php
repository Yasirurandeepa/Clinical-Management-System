<?php

require_once("../../php/dbOps/crud.php");
require_once("../../php/users/userTypes.php");

$id = $_POST['id'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$crud = new Crud();

$query = "UPDATE patient SET weight='$weight', height='$height' WHERE id='$id'";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>