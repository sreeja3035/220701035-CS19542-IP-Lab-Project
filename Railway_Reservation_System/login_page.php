<?php
    include 'config.php';
    session_start();
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from users where email='$email'";
        $result = $con->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $passwordInDb = $row['password'];

            if(password_verify($password, $passwordInDb)){
                $_SESSION['user'] = $row['firstName'].' '.$row['lastName'];
                $_SESSION['id'] = $row['id'];
                header('location:ticket_booking.php');
            } else {
                echo '<script>alert("Wrong Credentials")</script>';    
            }
        }
        else{
            echo '<script>alert("Credentials")</script>';    
    
        }
    }
    // session_start();
    // if(isset($_POST['login'])){
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //     $sql = "select * from users where email='$email'";
    //     $result = mysqli_query($con, $query);
    //     $num = mysqli_num_rows($result);     
    //     if($num == 1){
    //         $_SESSION['id'] = $result['id'];
    //         $_SESSION['user'] = $result['firstName'].' '.$result['lastName'];
    //         header('location:index.php');
    //     }
    //     else{
    //         echo '<script>alert("Wrong Credentials")</script>';    
    
    //     }
    // }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.container').hide().fadeIn(1000);
        });
    </script>

    <title>Login</title>

</head>

<body class="bg-info">
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
                <a class="nav-item nav-link active space" href="login_page.php">Sign In</a>
                <a class="nav-item nav-link space" href="register_page.php">Register</a>
            </div>
        </div>
    </nav>

    <br>
    <br>

    <div class="container p-5 bg-light rounded">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" class="label-text">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="label-text">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <div class="form-group">
                Don't have an account? <a href="register_page.php">Register</a>
            </div>
            <input type="submit" name='login' class="btn btn-primary">
        </form>
    </div>

</body>

</html>