<?php

session_start();
if(isset($_SESSION['email']))
{
   include("conn.php");

    $query =  "select* from registration" ;
    $res =mysqli_query($conn,$query);
    
    if(mysqli_num_rows($res)>0)
    {
        while( $row =mysqli_fetch_array($res))
        {
            echo $row['id']." ".$row['uname']." ".$row['email'];
            echo "<br>";
        }
        
    }
    else{
        echo "Error:";
    }
}
else{
    header("Location:login.php");
    exit();
}

?>