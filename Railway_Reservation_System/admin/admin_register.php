<?php

    include '../config.php';
    session_start();
    if(!isset($_SESSION['adminUsername'])){
        header('location: index.php');
    }

    if(isset($_POST['adminRegister'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "insert into admin(username, email, password) values ('$username', '$email','$hashed_password')";

        if(mysqli_query($con, $sql)){
            header('location: admin_home.php');
        } else{
            echo "<script>alert('Error')</script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Admin Login</title>
</head>
<body>
    <br>
    <h1 class="text-center">Admin Register</h1>

    <div class="container p-5 w-25 shadow-lg p-3 mb-5 bg-light rounded">
        <form method="post">
            <div class="form-group">
                <label for="username" class="label-text">Username</label>
                <input type="text" name="username" class="form-control" id="username"
                    placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="email" class="label-text">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password" class="label-text">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>

            <input type="submit" name="adminRegister" class="btn btn-primary">
        </form>
    </div>
    
</body>
</html>