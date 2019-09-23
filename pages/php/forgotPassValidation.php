<?php
require_once("../../php/dbOps/crud.php");
$crud = new Crud();
$user_id = $_GET['user_id'];
$pass = $_GET['pass'];

$query = "SELECT * FROM user  WHERE id='$user_id'";
$response = $crud -> getData($query);

if($response){
    echo (password_verify($pass, $response[0]['password']));
}else{
    echo true;
}
?>