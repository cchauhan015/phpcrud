<?php
    session_start();
    
    if($_SESSION['email']!=null && $_SESSION['email']=='admin')
    {
        include_once 'conn.php';
        $id = $_GET['id'];
        echo $id;
        $sql = "delete from registration where id =$id";

        $res = mysqli_query($con, $sql);
        if($res)
        {
            header("Location:home1.php");
        }
        else
        {
            echo "<script>alert('Something went wrong...!!')</script>";
        }
    }
    else
    {
        header("Location:home1.php");
        exit();
    }

?>