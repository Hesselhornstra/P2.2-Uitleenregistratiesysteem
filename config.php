<?php
ini_set("session.hash_function","sha512");
session_start();

date_default_timezone_set('Europe/Amsterdam');
ini_set("max_execution_time",500);

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_data = "uitleensysteem";

$con = new mysqli($db_host,$db_user,$db_pass,$db_data);
?>