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
    
    <title>ADMIN HOME</title>
</head>
<body>
    
    <br>
    <h1 class="text-center bg-primary p-3">Welcome Admin</h1>
    <br>

    <br>
    <div class="container"> 
        <div class="row">
            <div class="col-3 text-center">
                <form action="all_travel_details.php">
                    <input type="submit" value="All Travel Details" class="btn btn-primary">
                </form>
            </div>
            <div class="col-3 text-center">
                <form action="all_user_details.php">
                    <input type="submit" value="All User Details" class="btn btn-primary">
                </form>
            </div>
            <div class="col-3 text-center">
                <form action="admin_register.php">
                    <input type="submit" value="Add Admin" class="btn btn-primary">
                </form>
            </div>
            <div class="col-3 text-center">
                <form action="admin_logout.php">
                    <input type="submit" value="Logout" class="btn btn-primary">
                </form>
            </div>
    </div>
    
</body>
</html>