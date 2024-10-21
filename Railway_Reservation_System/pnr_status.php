


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>PNR Status</title>

    <!-- <script>
        $(document).ready(function () {
            $('.alert').hide();
            $('button').click(function () {
                if ($('input[type="number"]').val()) {
                    $('.alert').show();
                }
                else {
                    $('.alert').hide();
                }
            });
        });
    </script> -->
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
                <a class="nav-item nav-link active space" href="pnr_status.php">PNR Status</a>
                <a class="nav-item nav-link space" href="ticket_booking.php">Book A Ticket</a>
                <a class="nav-item nav-link space" href="login_page.php">Sign In</a>
                <a class="nav-item nav-link space" href="register_page.php">Register</a>
            </div>
        </div>
    </nav>

    <br>
    <br>

    <div class="container w-50 shadow-lg p-3 mb-5 bg-light rounded">
        <h1 class="text-center text-info">Get PNR Status</h1>
        <br>
        <hr>
        <br>
        <form class="form-inline" method="post" action="pnr_result.php">
            <div class="form-group mb-2">
                <label for="pnrNumberLabel" class="sr-only">Enter PNR Number</label>
                <input type="text" readonly class="form-control-plaintext label-text" id="pnrNumberLabel"
                    value="Enter PNR Number">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="pnrNumber" class="sr-only label-text">PNR Number</label>
                <input type="number" class="form-control" id="pnrNumber" name="pnrNumber" placeholder="PNR Number" required>
            </div>
            <!-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop">
                Get PNR Status
            </button> -->
            <input type="submit" class="btn btn-primary mb-2" name="pnrSubmit">
        </form>
        <br>
        <hr>
        <br>
        <!-- <div class="alert alert-success confirmed" style="text-align: center;" role="alert">
            Your Tickets are Confirmed
        </div>
        <div class="alert alert-danger waiting" style="text-align: center;" role="alert">
            Your Tickets are Waiting
        </div> -->
    </div>

    <!-- Modal -->
    <!-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Your PNR Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Your status is <span class="text-success">Confirmed</span>
                    Your status is <span class="text-success">Confirmed</span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ">OK</button>
                </div>
            </div>
        </div>
    </div> -->



</body>

</html>