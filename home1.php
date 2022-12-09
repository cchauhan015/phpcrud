<?php
    session_start();
    include("conn.php");
    if(isset($_SESSION['email'])){
        $query =  "select* from registration" ;
    
        $res =mysqli_query($con,$query);
    
        // if(mysqli_num_rows($res)>0)
        // {
        //     while( $row =mysqli_fetch_array($res))
        //     {
        //         echo $row['id']." ".$row['name']." ".$row['email'];
        //         echo "<br>";
           
        //     }
            
        // }
        // else{
        //     echo "Error:";
        // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>welcome to .....! <?php echo $_SESSION['email']; ?>   </h1>
    <h1><a href="logout.php">logout</a></h1>
    <div class="row d-flex justify-content-around mt-5">
        <form class="form-group" method="post">
            <div class="d-inline-block">
                <label class="form-label">Name : </label>
            </div>
            <div class="d-inline-block">
                <input type="text" class="form-control" name="name" placeholder="Enter Name">
            </div>
            <div class="d-inline-block">
                <input class="btn btn-primary ml-3" type="submit" value="Find" name="find">
            </div>
        </form>
        <form class="form-group" method="post">
            <div class="d-inline-block">
                <label class="form-label">Sort By:</label>
            </div>
            <div class="d-inline-block">
                <select class="form-control" name="filter">
                    <option value="null">--SELECT--</option>
                    <option value="id">ID</option>
                    <option value="Name">Name</option>
                    <option value="Email">Email</option>
                </select>
            </div>
            <div class="d-inline-block">
                <input class="btn btn-primary ml-3" type="submit" value="sort" name="sort">
            </div>
        </form>
    </div>
    <div class="container">
        <table class="table table-border table-hover">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th colspan=2>Manage</th>
            </tr>
            <?php
                if(isset($_POST['sort'])){
                    $cat = $_POST['filter'];
                    // echo $greating;
                    $query = "select * from registration order by $cat";
                    
                }
                elseif(isset($_POST['find'])){
                    $name = $_POST['name'];
                    $query = "select * from registration where Name like '%$name%'";

                }
                else{
                    $query = "select * from registration";
                }
                $res = mysqli_query($con,$query);
                if(mysqli_num_rows($res)>0){
                    while($data = mysqli_fetch_array($res)){
            
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><a href="update.php?id=<?php echo $data['id']; ?>"><i class="fa fa-pencil"
                            style="font-size:24px;color:green"></i></a></td>
                <td><a href=""><i class="fa fa-trash" style="font-size:24px;color:red"></i></a></td>

            </tr>
            <?php
                
                }
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>     
</body>
</html>

<?php
}
else
{
    header("Location:Login.php");
    exit();
}

?>