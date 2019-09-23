<?php
/**
 * Created by PhpStorm.
 * User: thili
 * Date: 1/10/2019
 * Time: 11:29 AM
 */

require_once "../../php/dbOps/crud.php";
require_once "../../php/users/userTypes.php";

$crud = new Crud();

$fname = $_POST['fName'];
$sname = $_POST['sName'];
$gender = $_POST['gender'];
$bday = $_POST['bday'];
$nic = $_POST['nic'];
$street = $_POST['street'];
$zipCode = $_POST['zipCode'];
$city = $_POST['city'];
$country = $_POST['country'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query_1 = "INSERT INTO user(fname, sname, gender, bday, nic, street, zipCode, city, country, email, telephone,type, password)".
    " VALUES".
    " ('$fname','$sname','$gender','$bday','$nic','$street','$zipCode','$city','$country','$email','$telephone','$STAFF_TYPE','$password')";

$dbResponse_1 = $crud->execute($query_1);

if($dbResponse_1){
    $query_2 = "SELECT id FROM user where email='".$email."'";
    $id = array_reverse($crud->getData($query_2))[0]['id'];
    echo true;
}else{
    echo false;
}

?>