<?php
session_start();

include("connection.php");

$id=$_GET['updateid'];
$_SESSION['id']=$id;

$query="SELECT f_name,l_name,password,cpassword,email,mobile from user where id=$id";
$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

$password=$row['password'];
$email=$row['email'];

$_SESSION['edite']=$email;
$_SESSION['editp']=$password;

     



      if($_SESSION['logine']==$_SESSION['edite'] && $_SESSION['loginp']==$_SESSION['editp']){
        header("location:update.php");
      }else{
        echo '<script>
        alert("Access Denied !!!.");
        </script>';
      }
     ?>