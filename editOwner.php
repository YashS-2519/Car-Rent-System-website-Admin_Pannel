<?php
include('connection.php');
include('authentication.php');


$editidOwner = $_GET['editidOwner'];
$editsqlOwner = "Select * from owners where id='".$editidOwner."'";
$editresultOwner = mysqli_query($conn, $editsqlOwner);
$editdataOwner = mysqli_fetch_array($editresultOwner);
$editidCar = $_GET['editidCar'];
$editsqlCar = "Select * from cars where id= '".$editidCar."'";
$editresultCar = mysqli_query($conn, $editsqlCar);
$editdataCar = mysqli_fetch_array($editresultCar);

if(isset($_POST['submit']) and isset($_POST['submit'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $model = $_POST['model'];
    $number = $_POST['number'];
    $fuel = $_POST['fuel'];
    $distance = $_POST['distance'];

    $sqlOwner = "update owners set name = '".$name."', mobile = '".$mobile."' where id = '".$editidOwner."'";
    $resultOwner = mysqli_query($conn, $sqlOwner);
    $sqlCar = "update cars set model='".$model."', number ='".$number."', fuel ='".$fuel."', distance ='".$distance."' where id ='".$editidCar."'";
    $resultCar = mysqli_query($conn, $sqlCar);

    if($resultOwner and $resultCar){
      header('location:owner.php');
    } else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Some technical problem occur.
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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="font.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Edit Owner</a>
  </div>
</nav>
    <div class="container">
        <form class="mt-5" action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" required name="name" class="form-control" id="name" aria-describedby="emailHelp" value="<?php echo $editdataOwner['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile No.</label>
                <input type="number" required class="form-control" name="mobile" id="mobile" value="<?php echo $editdataOwner['mobile'] ?>">
                <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">model</label>
                <input type="text" required name="model" class="form-control" id="model" aria-describedby="emailHelp" value="<?php echo $editdataCar['model'] ?>">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="text" required class="form-control" name="number" id="number" value="<?php echo $editdataCar['number'] ?>">
            </div>
            <div class="mb-3">
                <label for="fuel" class="form-label">fuel</label>
                <input type="text" required class="form-control" name="fuel" id="fuel" value="<?php echo $editdataCar['fuel'] ?>">
            </div>
            <div class="mb-3">
                <label for="distance" class="form-label">distance</label>
                <input type="number" required class="form-control" name="distance" id="distance" value="<?php echo $editdataCar['distance'] ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>