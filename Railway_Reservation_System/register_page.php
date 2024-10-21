<?php 

    include 'config.php';
    session_start();
    if(isset($_POST['register'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // $firstName = mysqli_real_escape_string($con,$_POST['firstName']);
        // $lastName = mysqli_real_escape_string($con,$_POST['lastName']);
        // $age = mysqli_real_escape_string($con,$_POST['age']);
        // $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
        // $gender = mysqli_real_escape_string($con,$_POST['gender']);
        // $email = mysqli_real_escape_string($con,$_POST['email']);
        // $password = mysqli_real_escape_string($con,$_POST['password']);
        // $confirmPassword = mysqli_real_escape_string($con,$_POST['confirmPassword']);

        if($password === $confirmPassword){

            $sql = "select * from users where email='$email'";
            $result = $con->query($sql);

            if ($result->num_rows == 1){
                echo "<script>alert('User Exists')</script>";
            }  else {

                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (firstName, lastName, age, mobile, gender, email, password) VALUES ('$firstName','$lastName','$age','$mobile', '$gender', '$email', '$hashed_password')";
                if(mysqli_query($con, $sql)){
                    // $_SESSION['user'] = $firstName.' '.$lastName;
                    header('location: login_page.php');
                } else{
                    echo "<script>alert('Error')</script>";
                }
            }
        } else {
            echo "<script>alert('Passwords Not Matching')</script>";
        }

    }

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
    <title>Register User</title>
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
                <a class="nav-item nav-link space" href="pnr_status.html">PNR Status</a>
                <a class="nav-item nav-link space" href="ticket_booking.php">Book A Ticket</a>
                <a class="nav-item nav-link space" href="login_page.php">Sign In</a>
                <a class="nav-item nav-link active space" href="register_page.php">Register</a>
            </div>
        </div>
    </nav>

    <br>
    <br>

    <div class="container p-5 bg-light w-50 rounded">
        <form action="" method="post">
            <div class="form-group">
                <label for="firstName" class="label-text">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name"
                    required>
            </div>
            <div class="form-group">
                <label for="lastName" class="label-text">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name"
                    required>
            </div>
            <div class="form-group">
                <label for="age" class="label-text">Age</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age" onkeypress="return event.charCode >= 48" required>
            </div>
            <div class="form-group">
                <label for="mobile" class="label-text">Mobile</label>
                <input type="phone" class="form-control" name="mobile" id="mobile" onkeypress="return event.charCode >= 48" placeholder="Enter Mobile Number"
                    required>
            </div>
            <div class="form-group">
                <label for="gender" class="label-text">Gender</label><br>
                <input type="radio" class="" name="gender" value="male">
                <label for="male" class="custom-radio-control">Male</label>
                <br>
                <input type="radio" name="gender" value="female">
                <label for="female" class="custom-radio-control">Female</label>
                <br>
                <input type="radio" name="gender" value="ratherNotToSay">
                <label for="ratherNotToSay" class="custom-radio-control">Rather Not To Say</label>
            </div>

            <!-- <div class="custom-control custom-radio">
                <input type="radio" id="radioMale" name="gender" class="custom-control-input" required>
                <label class="custom-control-label" for="customRadio1">Male</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="radioFemale" name="gender" class="custom-control-input" required>
                <label class="custom-control-label" for="customRadio2">Female</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="radioRatherNotToSay" name="gender" class="custom-control-input" required>
                <label class="custom-control-label" for="customRadio2">Rather Not To Say</label>
            </div> -->

            <div class="form-group">
                <label for="email" class="label-text">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="password" class="label-text">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                    required>
            </div>
            <div class="form-group">
                <label for="confirmPassword" class="label-text">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="comfirmPassword"
                    placeholder="Password" required>
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <br>
            <div class="form-group">
                Have an account? <a href="login_page.php">Sign In</a>
            </div>
            <input type="submit" name="register" class="btn btn-primary btn-lg">
        </form>
    </div>

</body>

</html>