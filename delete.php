<?php
include('connection.php');

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
}
$query="DELETE FROM user where id=$id";


$result=mysqli_query($conn,$query);

if($result){
    header('location:read.php');
}
else{
    die("ERROR!!!");
}
mysqli_close($conn);
?>