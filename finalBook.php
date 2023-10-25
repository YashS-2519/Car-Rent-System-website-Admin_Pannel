<?php
include('connection.php');
include('authentication.php');

$customerId = $_GET['customerBookid'];
$customerSql = "Select * from customer where id='" . $customerId . "'";
$customerResult = mysqli_query($conn, $customerSql);
$customerData = mysqli_fetch_array($customerResult);

$carId = $_GET['carBookid'];
$carSql = "Select * from cars where id='" . $carId . "'";
$carResult = mysqli_query($conn, $carSql);
$carData = mysqli_fetch_array($carResult);

if (isset($_POST['submit'])) {
    $customerId = $_POST['customerId'];
    $carId = $_POST['carId'];
    $rate = $_POST['rate'];
    $sql = "Update customer set rate='" . $rate . "', book='" . $carId . "' where id='" . $customerId . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:coustomers.php');
    } else {
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
            <a class="navbar-brand" href="#">Book Car</a>
        </div>
    </nav>
    <div class="container mt-5">
        <form method="post">
            <fieldset disabled>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Name</label>
                    <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $customerData['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Mobile</label>
                    <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $customerData['mobile'] ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Car Model</label>
                    <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $carData['model'] ?>">
                </div>
                <div class="mb-3">
                    <label for="preDistance" class="form-label">Number</label>
                    <input type="text" id="preDistance" class="form-control" value="<?php echo $carData['distance'] ?>">
                </div>
            </fieldset>
            <input type="hidden" name="customerId" value="<?php echo $customerData['id'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="hidden" name="carId" value="<?php echo $carData['id'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rate per km</label>
                <input type="number" required placeholder="Default value '6'" name="rate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Book</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>