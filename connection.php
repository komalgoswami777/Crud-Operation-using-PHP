<?php 
$hostname="localhost";
$username="root";
$password="";
$databasename="crud";

$conn=mysqli_connect($hostname,$username,$password,$databasename);

if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
?>