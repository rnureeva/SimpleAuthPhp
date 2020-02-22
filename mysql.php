<?php
$host= 'localhost';
$user= 'test';
$password= 'test';
$dbname= 'nureevar_test';
var_dump($_SERVER);
$connect = mysqli_connect($host, $user, $password, $dbname);
if(mysqli_connect_errno()) {
	echo mysqli_connect_error();
} else {
	echo mysqli_get_host_info($connect);
}

mysqli_close($connect);