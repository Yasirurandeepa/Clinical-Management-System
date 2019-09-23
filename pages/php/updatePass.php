<?php

require_once("../../php/dbOps/crud.php");
require_once("../../php/users/userTypes.php");

$id = $_POST['id'];

$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

$crud = new Crud();

$query = "UPDATE user SET password='$pass'  WHERE id='$id'";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>