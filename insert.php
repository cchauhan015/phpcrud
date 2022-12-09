<?php
include("conn.php");

if( $_POST['name']!="" &&  $_POST['pass']!="" &&  $_POST['cpass']!="" &&  $_POST['email']){
        $uname = $_POST['name'];
        $password = $_POST['pass'];
        $cpssword =$_POST["cpass"];
        $email = $_POST['email'];


        $sql = "insert into registration values('','$uname','$password','$cpssword','$email')";
        // echo $sql;
        if(mysqli_query($con,$sql)){
            echo "Register successfully...";
        }
        else{
            echo "Something went wrong";
        }

    }

?>