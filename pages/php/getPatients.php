<?php
require_once("../php/dbOps/crud.php");
$crud = new Crud();
$query = "SELECT * FROM user NATURAL RIGHT OUTER JOIN patient";
$dbResponse = $crud -> getData($query);
?>