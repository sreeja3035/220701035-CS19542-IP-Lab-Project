<?php
    session_start();
    $id = $_SESSION['id'];
    echo $id;
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="#" style="font-size: 1.7rem;">P2P Railways</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link space" href="index.php">Home</a>
                <a class="nav-item nav-link space" href="pnr_status.php">PNR Status</a>
                <a class="nav-item nav-link space" href="ticket_booking.php">Book A Ticket</a>
                <?php 
                    if(isset($_SESSION['user'])){
                        echo '<a class="nav-item nav-link active space" href="booking_history.php">Booking History</a>';
                        echo '<a class="nav-item nav-link space text-success" href="#">Welcome '.$_SESSION['user'].'</a>';
                        echo '<a class="nav-item nav-link space" href="logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-item nav-link space" href="login_page.php">Sign In</a>';
                        echo '<a class="nav-item nav-link space" href="register_page.php">Register</a>';
                    }
                ?>
            </div>
        </div>
    </nav>

    <br>
    <br>

    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Source Station</th>
                    <th scope="col">Destination Station</th>
                    <th scope="col">Date</th>
                    <th scope="col">PNR Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM travel_details where userId=$id";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){                                                   
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
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