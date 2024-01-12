<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Database Records</title>
        <style>
             @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap');
            table{
                width: 70%;
                margin: 100px 50px 50px 50px;
                font-family: 'Poppins', sans-serif;
            }
            table,tr,th,td{
                border: 1px solid #d4d4d4;
                padding: 12px;
            }
            th,td{
                text-align: left;
                vertical-align: top;
            }
            tr:nth-child(even){
                background-color: #e7e9eb;
            }
            a,.button{
                padding:10px;
                background-color:powderblue;
                text-decoration:none;
            }
            .button{
                margin:30px 10px 10px 10px;
            }
        </style>
    </head>
    <body>
        <?php

echo '<a href="Form.html" class="button">Add User </a>';

        include('connection.php');
        if(isset($_POST['submit'])){
            header('location:form.html');
        }
        $sql="SELECT id,f_name,l_name,email,mobile,password FROM user";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            echo '<table><tr><th> Serial No: </th><th>First Name </th><th>Last Name </th><th> Email-id </th><th>Mobile No</th><th>Operations</th></tr>';
            while($row=mysqli_fetch_assoc($result)){
                echo '<tr><td>'.$row["id"].'</td>
                <td>'.$row["f_name"].'</td>
                <td>'.$row["l_name"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["mobile"].'</td>
                <td><a href="session.php?updateid='.$row["id"].'" style="padding-right:5px">Update</a>
                <a href="delete.php?deleteid='.$row["id"].'" style="padding-left:5px">Delete</a>
                </td></tr>' ;
                session_start();
                $_SESSION["email"]=$row["email"];
                $_SESSION["password"]=$row["password"];
            }
            echo '</table>';
        }
        else{
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </body>
</html>
