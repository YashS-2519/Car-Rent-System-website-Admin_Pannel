<?php
include('connection.php');
include('authentication.php');
if(isset($_POST['submit'])){
    $model = $_POST['model'];
    $number = $_POST['number'];
    $fuel = $_POST['fuel'];
    $distance = $_POST['distance'];
    
    $sqlcar = "insert into cars (model,number,fuel,distance) values ('".$model."','".$number."','".$fuel."','".$distance."')";
    $resultCar = mysqli_query($conn, $sqlCar);

    if($result){
      header('location:cars.php');
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
    <a class="navbar-brand" href="#">Add Car</a>
  </div>
</nav>
    <div class="container">
        <form class="mt-5" action="" method="post">
            <div class="mb-3">
                <label for="model" class="form-label">model</label>
                <input type="text" required name="model" class="form-control" id="model" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="text" required class="form-control" name="number" id="number">
            </div>
            <div class="mb-3">
                <label for="fuel" class="form-label">fuel</label>
                <input type="text" required class="form-control" name="fuel" id="fuel">
            </div>
            <div class="mb-3">
                <label for="distance" class="form-label">distance</label>
                <input type="number" required class="form-control" name="distance" id="distance">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>