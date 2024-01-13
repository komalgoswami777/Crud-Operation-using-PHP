<?php
session_start();

include("connection.php");

      $email=$_POST['email'];
      $password=$_POST['password'];
      $_SESSION['logine']=$email;
      $_SESSION['loginp']=$password;



  $sql="SELECT * from user where email='$email'and password=$password";


  $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

      $row=mysqli_fetch_assoc($result);

        if($row['email']===$email && $row['password']===$password){

          echo '<script>
          alert("Logged in !!!.");
          </script>';
          $_SESSION['email']=$row['email'];
          $_SESSION['password']=$row['password'];
          header("location:read.php");
          echo '<script>
          alert("Logged in !!!.");
          </script>';
        }
        else{

        header("location:read.php");
        }
      }


   
    mysqli_close($conn);
?>
