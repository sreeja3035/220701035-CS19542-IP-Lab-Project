   <?php
    session_start();
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

    <title>P2P Railways</title>
    <link rel="icon" href="train_icon.png" type="image/icon type">


    <!-- <script>
        $(document).ready(function(){
            $('.centerContainer').fadeIn();
        });
    </script> -->

</head>

<body>
    <!-- <nav class="navbar navbar-expand-sm bg-dark fixed-top justify-content-around">
        <a class="nav-link" href="#">Link 1</a>
        <a class="nav-link" href="#">Link 2</a>
        <a class="nav-link" href="#">Link 3</a>
    </nav> -->


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="#" style="font-size: 1.7rem;">P2P Railways</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link space active" href="index.php">Home</a>
                <a class="nav-item nav-link space" href="pnr_status.php">PNR Status</a>
                <a class="nav-item nav-link space" href="ticket_booking.php">Book A Ticket</a>
                <?php 
                    if(isset($_SESSION['user'])){
                        echo '<a class="nav-item nav-link space" href="booking_history.php">Booking History</a>';
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

    <div class="container bg-muted formBody">
        <div class="container centerContainer bg-dark">
            <h1 class="text-white">Welcome to P2P Railways</h1>
            <br>
            <h3 class="text-white">Have A Safe Journey</h3>
            <br>
            <?php 
                if(isset($_SESSION['user'])){
                    echo '<h4 class="text-info">Welcome back, <span class="text-warning"> '.$_SESSION['user'].'</span> </h4>';
                } else {
                    echo '<h4><a href="login_page.php">Please Register/Login Before Booking Tickets</a></h4>';
                }
            ?>

        </div>
    </div>

    <br>
    <br>

    <div class="container-fluid text-danger" style="background-color: rgba(252, 241, 210, 0.3);">
        <marquee behavior="scroll" width="100%" direction="left" scrollamount="10">
            We wish you a happy and safe journey.
        </marquee>
    </div>




</body>

</html>