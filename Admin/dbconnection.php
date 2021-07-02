<?php 
session_start();
$serverN = 'localhost';
$userN = 'root';
$userP = ''; //because server is localhost
$dbN = 'myproject';

$con = mysqli_connect($serverN,$userN,$userP,$dbN);
//connection validation
if($con){
    echo 'connecton done';
}
else{
    die('Error '.mysqli_connect_error());
}

?>