<?php

include('connection.php');

if(isset($_POST['submit'])){

$f_name=$_REQUEST['f_name'];
$l_name=$_REQUEST['l_name'];
$password=$_REQUEST['password'];
$cpassword=$_REQUEST['cpassword'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];

$sql="SELECT * from user where email='$email'";

$res_u=mysqli_query($conn,$sql);

  if(mysqli_num_rows($res_u)>0){
   
     echo '<script>
         alert("sorry...username already exist.");
      </script>';
  }else{

$query="INSERT INTO user (f_name,l_name,password,cpassword,email,mobile) VALUES ('$f_name','$l_name','$password','$cpassword','$email','$mobile')";

$result=mysqli_query($conn,$query);

if($result){
    // echo ("inserted");
     header('location:read.php');
}
else{
    die("ERROR!!!");
}
}
}
mysqli_close($conn);
?>