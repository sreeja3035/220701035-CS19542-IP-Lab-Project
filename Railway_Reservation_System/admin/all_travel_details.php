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
    <title>All Travel Details</title>
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
        <h1 class="bg-warning text-light p-3">TRAVEL DETAILS DETAILS</h1>
    </div>
    <div class="container">
        <br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">Source Station</th>
                    <th scope="col">Destination Station</th>
                    <th scope="col">Date</th>
                    <th scope="col">PNR Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM travel_details";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){                                                   
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                            echo '<td>'. $row['userId'] .'</td>';  
                            echo '<td>'. $row['sourceStation'] .'</td>';
                            echo '<td>'. $row['destStation'] .'</td>';  
                            echo '<td>'. $row['date'] .'</td>';
                            echo '<td>'. $row['pnr'] .'</td>';
                        }
                    } 
                ?>         
            </tbody>
        </table>
    </div>

    
</body>
</html>