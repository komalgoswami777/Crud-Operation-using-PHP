<?php
include("connection.php");

      session_start();
      $email=$_SESSION['email'];
      $password=$_SESSION['password'];
      print_r ($_SESSION);
      $sql="SELECT * from user where email='$email'and password=$password ";


  $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        echo '<script>
             alert("Logged in !!!.");
             </script>';
        header("location:update.php");
      }

    //   $row=mysqli_fetch_assoc($result);

    //     if($row['email']===$email && $row['password']===$password){

    //       echo '<script>
    //       alert("Logged in !!!.");
    //       </script>';
    //       header("location:update.php");
    //     }
    //     else{

    //         echo ("No accesss");
        // header("location:read.php");


   
    mysqli_close($conn);
?>
