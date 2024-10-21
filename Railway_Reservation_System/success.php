<?php

    session_start();
    if(!isset($_SESSION['id'])){
        header('location: login_page.php');
    }
    $pnr = $_GET['pnr'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Booking Success</title>
</head>
<body class="bg-success">
    <div class="container p-5 d-flex aligns-items-center justify-content-center rounded-3">
        <div class="card text-center shadow p-5">
            <div class="card-body">
                <h1 class="card-title ">Booking Successful</h1>
                <h5 class="card-text p-3">Your PNR Number: <?php echo $pnr;?></h5>
                <hr>
                <a href="index.php" class="btn btn-primary">Go to Home</a>
            </div>
        </div>
    </div>
</body>
</html>
