<?php
require_once "../dbOps/crud.php";
require_once "userTypes.php";

$email = $_GET['email'];
$password = $_GET['password'];
$query = "SELECT id,password,type FROM user WHERE email='$email'";
$crud = new Crud();
$response = $crud->getData($query);
session_start();
if ($response && password_verify($password, $response[0]['password'])) {
    $_SESSION["logged_id"] = $response[0]['id'];
    $_SESSION["logged_type"] = $response[0]['type'];
    echo json_encode(array('id'=>$response[0]['id'],'type'=>$response[0]['type']));
} else {
    echo false;
}

?>