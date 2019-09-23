<?php
require_once("../php/dbOps/crud.php");
require_once("../php/users/userTypes.php");
$crud = new Crud();
$query = "SELECT * FROM user WHERE type='$STAFF_TYPE'";
$allStaff = $crud -> getData($query);
?>