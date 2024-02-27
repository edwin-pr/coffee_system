<?php
session_start();
error_reporting(0);
$con=mysqli_connect('localhost','root','','crm');
if(mysqli_errno($con))
{
	echo "Database Uplink Failure...<br>".mysqli_error($con);


}
$domain = "http://localhost/coffee/";
//$_SESSION['domain']=$domain;
$mtero = $_SESSION['admin'];
$currency=" Kshs";
$company_namez="Coffee Management System";
?>