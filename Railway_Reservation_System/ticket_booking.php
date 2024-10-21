<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header('location: login_page.php');
    }
    $id = $_SESSION['id'];  
    include 'config.php';
    if(isset($_POST['bookTicket'])){
        $sourceStation = $_POST['sourceStation'];
        $destStation = $_POST['destStation'];
        $date = date('Y-m-d', strtotime($_POST['date']));
        $pnr = str_pad(rand(100000,9999999999), 10, '0', STR_PAD_LEFT);

        $sql = "insert into travel_details (userId, sourceStation, destStation, date, pnr) values('$id', '$sourceStation', '$destStation', '$date', '$pnr')";

        if(mysqli_query($con, $sql)){
            header('location: success.php?pnr='.$pnr);
        } else {
            echo "error";
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
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("img").hide().fadeIn(2000);
            $('.container').hide().fadeIn(1000);

            $("#submitButton").click(function(){
                let source = document.getElementById('sourceStation').value;
                let dest = document.getElementById('destStation').value;
                if(source == ''){
                    alert('Select Source Station');
                } else if(dest == ''){
                    alert('Select Destination Station');
                } else if(source == dest){
                    alert('Source and Destination Stations are same');
                } else {
                    $("#hiddenButton").click();
                }
            });


        });

    </script>

    <title>Book A Ticket</title>
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
                <a class="nav-item nav-link active space" href="ticket_booking.php">Book A Ticket</a>
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

    <div class="container p-3 bg-light rounded">
        <center><img
                src="https://images.unsplash.com/photo-1515165562839-978bbcf18277?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dHJhaW58ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                alt="" srcset="" class="rounded"></center>
        <br>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <!-- <label for="pickTrain" class="label-text">Pick A Train</label>
                <select class="form-control" name="pickTrain" required>
                    <option value="" selected disabled hidden>Choose here</option>

                    <option value="sbc-ndls">Bangalore To New Delhi - RAJDHANI EXP (22691)</option>
                    <option value="sbc-hyb">Bangalore To Hyderabad KONGU EXPRESS (12647)</option>
                    <option value="mas-csmt">Chennai To Mumbai - MAS CSMT Express (22160)</option>
                    <option value="mas-sbc">Chennai To Bangalore - MAS SBC Shadabthi (12027)</option>
                    <option value="mas-ndls">Chennai To Delhi - MAS NZM RAJDHAN (12433)</option>
                    <option value="mas-hyb">Chennai To Hyderabad - CHARMINAR EXP (12759)</option>
                    <option value="csmt-sbc">Mumbai To Bangalore - RJT CBE EXP (16613)</option>
                    <option value="csmt-ndls">Mumbai To New Delhi - NZM RAJDHANI EX (22221)</option>
                    <option value="csmt-hyb">Mumabi To Hyderabad - KONARK EXPRESS (11019)</option>
                    <option value="ndls-hyb">New Delhi To Hyderabad - NZM SC RAJDHANI (12438)</option>

                </select> -->

                <label for="sourceStation" class="label-text">Source Station</label>
                <select class="form-control" name="sourceStation" id="sourceStation" required>
                    <option value="" selected disabled hidden>Choose here</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Jaipur">Jaipur</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Trivandram">Trivandram</option>
                </select>

            </div>

            <div class="form-group">
            <label for="destStation" class="label-text">Destination Station</label>
                <select class="form-control" name="destStation" id="destStation" required>
                    <option value="" selected disabled hidden>Choose here</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Jaipur">Jaipur</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Trivandram">Trivandram</option>
                </select>
            </div>

            <br>

            <div class="form-group">
                <label for="dateOfJourney" class="label-text">Date Of Journey</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
            <input type="submit" name="bookTicket" class="btn btn-primary" id="hiddenButton" value="Submit" hidden>
        </form>

    </div>





</body>

</html>