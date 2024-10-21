<?php
    include '../config.php';
    session_start();
    if(isset($_SESSION['adminUsername'])){
        header('location: admin_home.php');
    }
    if(isset($_POST['adminLogin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from admin where email='$email'";
        $result = $con->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $passwordInDb = $row['password'];

            if(password_verify($password, $passwordInDb)){
                $_SESSION['adminUsername'] = $row['username'];
                header('location:admin_home.php');
            } else {
                echo '<script>alert("Wrong Credentials")</script>';    
            }
        }
        else{
            echo '<script>alert("Credentials")</script>';    
    
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
    <h1 class="text-center">Admin Login</h1>

    <div class="container p-5 w-25 shadow-lg p-3 mb-5 bg-light rounded">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" class="label-text">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="label-text">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <input type="submit" name="adminLogin" class="btn btn-primary">
        </form>
    </div>
    
</body>
</html>