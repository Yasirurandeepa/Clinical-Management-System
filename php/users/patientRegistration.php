<?php
/**
 * Created by PhpStorm.
 * User: thili
 * Date: 1/10/2019
 * Time: 11:29 AM
 */

require_once "../dbOps/crud.php";
require_once "userTypes.php";

$crud = new Crud();

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$gender = $_POST['gender'];
$bday = $_POST['bday'];
$nic = $_POST['nic'];
$street = $_POST['street'];
$zipCode = $_POST['zipCode'];
$city = $_POST['city'];
$country = $_POST['country'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

$bloodType = $_POST['bloodType'];
$weight = $_POST['weight'];
$height = $_POST['height'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);



$query_1 = "INSERT INTO user(fname, sname, gender, bday, nic, street, zipCode, city, country, email, telephone,type, password)".
    " VALUES".
    " ('$fname','$sname','$gender','$bday','$nic','$street','$zipCode','$city','$country','$email','$telephone','$PATIENT_TYPE','$password')";

$dbResponse_1 = $crud->execute($query_1);

if($dbResponse_1){
    $query_2 = "SELECT id FROM user where email='".$email."'";
    $id = array_reverse($crud->getData($query_2))[0]['id'];
    $query_3 = "INSERT INTO patient(id, bloodType, weight,height) VALUES ('$id','$bloodType','$weight','$height')";
    if($crud->execute($query_3)){
        echo true;
    }else{
        $query_4 = "DELETE FROM user WHERE email='".$email."'";
        $crud->execute($query_4);
        echo false;
    }
}else{
    echo false;
}

?>