<?php 

    include 'config.php';
    $pnr = $_POST['pnrNumber'];

    $sql = "select * from travel_details where pnr=$pnr";
    $result = $con->query($sql);
    // $row = $result->fetch_assoc();

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if ($row['date'] >= date("Y-m-d")){
            $toPrint = '<h5 class="card-text p-3">Your travel is on : '.date("d-m-Y", strtotime($row['date'])).'</h5><h6>Have a happy and safe journey</h6>';
        } else {
            $toPrint = '<h5 class="card-text p-3">Your have travelled on : '.date("d-m-Y", strtotime($row['date'])).'</h5><h6>Thanks for choosing P2P Railways</h6>';
        }
    } else {
        $toPrint = '<h5 class="card-text p-3">Please provide correct PNR Number</h5><h6>Thanks for choosing P2P Railways</h6>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>PNR Status</title>
</head>
<body class="bg-success">
    <div class="container p-5 d-flex aligns-items-center justify-content-center rounded-3">
        <div class="card text-center shadow p-5">
            <div class="card-body">
                <?php echo $toPrint?>
                <hr>
                <a href="pnr_status.php" class="btn btn-primary">Check another ticket</a>
                <a href="index.php" class="btn btn-primary">Go to Home</a>
            </div>
        </div>
    </div>
</body>
</html>