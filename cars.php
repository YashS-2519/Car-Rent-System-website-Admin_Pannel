<?php
include('connection.php');
include('authentication.php');
if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $sql = "delete from cars where id = '".$delid."'";
    $result = mysqli_query($conn, $sql);
    if($result){

    }
    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Some technical issue occur.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cars List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cars</a>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Model</th>
                <th scope="col">No.</th>
                <th scope="col">Fuel Type</th>
                <th scope="col">Distance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $c = 1;
            $sql = "Select * from cars";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($result)) {
                $getdata = "Select * from customer where book='".$data['id']."'";
                $checkResult = mysqli_query($conn, $getdata);
                $checkData = mysqli_fetch_array($checkResult);
                $checkDatar = mysqli_num_rows($checkResult);
            ?>
                <tr>
                    <th><?php echo $c++ ?></th>
                    <td><?php echo $data['model'] ?><?php if($checkDatar>0) echo '<div class="form-text"><a href="returnCar.php?carid='.$data['id'].'&customerid='.$checkData['id'].'" title="Return car" >Already Booked by '.$checkData['name'].'./'.$checkData['mobile'].'</a></div>'  ?></td>
                    <td><?php echo $data['number'] ?></td>
                    <td><?php echo $data['fuel'] ?></td>
                    <td><?php echo $data['distance'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>