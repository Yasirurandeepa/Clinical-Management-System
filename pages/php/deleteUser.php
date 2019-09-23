<?php

require_once("../../php/dbOps/crud.php");
require_once("../../php/users/userTypes.php");

$id = $_GET['id'];

$crud = new Crud();

$query = "DELETE FROM user WHERE id='$id';";

if($crud->execute($query)){
    echo true;
}else{
    echo false;
}

?>