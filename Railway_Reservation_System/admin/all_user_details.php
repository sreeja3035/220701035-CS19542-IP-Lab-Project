<?php
    include '../config.php';
    session_start();
    if(!isset($_SESSION['adminUsername'])){
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>All User Details</title>
</head>
<body>
    <br>    
    <div class="container text-center"> 
        <a href="admin_home.php" class="btn btn-primary">Go Home</a>
    </div>
    <br>
    <div class="container text-center"> 
        <a href="admin_logout.php" class="btn btn-primary">Logout</a>
    </div>
    <br>
    <div class="container text-center">
        <h1 class="bg-warning text-light p-3">USER DETAILS</h1>
    </div>
    <div class="container">
        <br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){                                                   
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                            echo '<td>'. $row['id'] .'</td>';  
                            echo '<td>'. $row['firstName'] .'</td>';
                            echo '<td>'. $row['lastName'] .'</td>';  
                            echo '<td>'. $row['age'] .'</td>';
                            echo '<td>'. $row['mobile'] .'</td>';
                            echo '<td>'. $row['gender'] .'</td>';
                            echo '<td>'. $row['email'] .'</td>';
                        }
                    } 
                ?>         
            </tbody>
        </table>
    </div>

    
</body>
</html>