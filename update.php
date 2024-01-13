<?php
session_start();

include('connection.php');

// echo $_SESSION['loginp'];
// echo $_SESSION['editp'];

echo $_SESSION['id'];


$id=$_SESSION['id'];



$query="SELECT f_name,l_name,password,cpassword,email,mobile from user where id=$id";
$result=mysqli_query($conn,$query);


$row=mysqli_fetch_assoc($result);

$f_name=$row['f_name'];
$l_name=$row['l_name'];
$password=$row['password'];
$cpassword=$row['cpassword'];
$email=$row['email'];
$mobile=$row['mobile'];

$_SESSION['edite']=$email;
$_SESSION['editp']=$password;

if(isset($_POST['submit'])){

   
$f_name=$_REQUEST['f_name'];
$l_name=$_REQUEST['l_name'];
$password=$_REQUEST['password'];
$cpassword=$_REQUEST['cpassword'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];
    
    $query="UPDATE user set f_name='$f_name',l_name='$l_name',password=$password,cpassword=$cpassword,email='$email',mobile=$mobile where id=$id";
    
    $result=mysqli_query($conn,$query);
    
    if($result){
        
        header('location:read.php');
        echo '<script>
        alert(Updated Successfully);
        </script>';
    }
    else{
        die("ERROR!!!");
    }
  
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<title>Update Form</title>
<head>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap');
        *{
         margin: auto;
         font-family: 'Poppins', sans-serif;
        }
        form{
            width: 70%;
            margin: 50px;
            padding: 10px;
        }
        input{
            border: 1px solid black;
        }
        input,label,button{
            padding: 5px;
            margin: 10px;
        }
        input:hover{
          border: 1px solid #0404fe;
        }
        button{
            background-color: #1133ff;
            color: white;
            border: none;
            padding: 10px;
        }
    </style>


</head>
<body>
<form method="POST">
<label for="">First</label><br>
            <input type="text" name="f_name" id="" value=<?php echo $f_name; ?>><br>
            <label for="">Last</label><br>
            <input type="text" name="l_name" id="" value=<?php echo $l_name; ?>><br>
            <label for="">password</label><br>
            <input type="text" name="password" id="" value=<?php echo $password; ?>><br>
            <label for="">confirm password</label><br>
            <input type="text" name="cpassword" id="" value=<?php echo $cpassword; ?>><br>
            <label for="">email</label><br>
            <input type="email" name="email" id="" value=<?php echo $email; ?>><br>
            <label for="">mobile</label><br>
            <input type="text" name="mobile" id="" value=<?php echo $mobile; ?>><br>
    <button type="submit" name="submit">Update</button>
</form>
</body>