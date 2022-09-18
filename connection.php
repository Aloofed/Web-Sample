<?php 
session_start();

$dbserver ="localhost";
$dbusername ="root";
$dbpass ="";
$dbname ="beauty";

$connect = mysqli_connect($dbserver,$dbusername,$dbpass,$dbname);
if(!$connect){
    echo '<script>';
    echo 'alert("Sorry cant connect to the database" .mysqli_connect_error());
    windwow.location.href="index.html"';
    echo '</script>';
}
try {
    $db = new PDO("mysql:host={$dbserver}; dbname={$dbname}",$dbusername, $dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOEXCEPTION $e) {
     //throw $th;
 }
?>