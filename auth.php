<?php
session_start();
if (isset($_POST['login'])) 
{
    $email = $_POST["email"];
    $pswd = $_POST["password"];
   
    if($email == "admin" && $pswd =="admin"){
        $_SESSION['email']=$email;
        header("Location: home1.php");
    }
    else{
        header("Location: login.php?error=Incorrent username or password");
    }
    
}
else{

    echo "Enter username or password";
    exit();
}
?>