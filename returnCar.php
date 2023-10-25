<?php
include('connection.php');
include('authentication.php');

$carid = $_GET['carid'];
$customerid = $_GET['customerid'];

$customerData = "Select * from customer where id='" . $customerid . "'";
$customerResult = mysqli_query($conn, $customerData);
$customerData = mysqli_fetch_array($customerResult);
$carData = "Select * from cars where id='" . $carid . "'";
$carResult = mysqli_query($conn, $carData);
$carData = mysqli_fetch_array($carResult);


if (isset($_POST['submit'])) {
    $distance = $_POST['distance'];
    $pending = $_POST['pending'];
    if ($carData['distance'] > $distance) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Current distance should greater than or equal to previous distance.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        $book = 0;
        $rate = 0;

        $sqlCustomer = "update customer set pending = '" . $pending . "', book = '" . $book . "', rate='" . $rate . "' where id = '" . $customerid . "'";
        $resultCustomer = mysqli_query($conn, $sqlCustomer);

        $sqlCar = "update cars set distance ='" . $distance . "' where cars.id ='" . $carid . "'";
        $resultCar = mysqli_query($conn, $sqlCar);

        if ($resultCustomer && $resultCar) {
            header('location:coustomers.php');
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Some technical problem occur.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Return Car</a>
        </div>
    </nav>
    <div class="container">
        <form class="mt-5" method="post">
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
                    <label for="preDistance" class="form-label">Previous Distance</label>
                    <input type="text" id="preDistance" class="form-control" value="<?php echo $carData['distance'] ?>">
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="distance" class="form-label">Current Distance</label>
                <input type="number" required name="distance" class="form-control" id="distance" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="fuelCharge" class="form-label">Fuel Charge</label>
                <input type="number" required value="0" class="form-control" id="fuelCharge" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Rupees per km</label>
                <input readonly type="number" required id="price" value="<?php if ($customerData['rate'] > 0) {
                                                                                echo $customerData['rate'];
                                                                            } else {
                                                                                echo '6';
                                                                            } ?>" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Total Cost of this ride</label>
                <input readonly type="number" id="cost" required class="form-control" name="cost">
            </div>
            <div class="mb-3">
                <label for="prepending" class="form-label">Previous Pending</label>
                <input type="number" readonly id="prepending" required value="<?php echo $customerData['pending'] ?>" class="form-control" name="prepending">
            </div>
            <div class="mb-3">
                <label for="pay" class="form-label">Pay</label>
                <input type="number" required class="form-control" id="pay">
            </div>
            <div class="mb-3">
                <label for="pending" class="form-label">Remains</label>
                <input type="number" required readonly id="pending" value="0.0" class="form-control" name="pending">
            </div>
            <button type="submit" name="submit" require class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        const input1 = document.getElementById("preDistance");
        const input2 = document.getElementById("distance");
        const input3 = document.getElementById("price");
        const input4 = document.getElementById("fuelCharge");
        const input5 = document.getElementById("pay");
        const input6 = document.getElementById("prepending");
        const result1 = document.getElementById("cost");
        const result2 = document.getElementById("pending");

        input1.addEventListener("input", updateResult);
        input2.addEventListener("input", updateResult);
        input3.addEventListener("input", updateResult);
        input4.addEventListener("input", updateResult);
        input5.addEventListener("input", updateResult);
        input6.addEventListener("input", updateResult);
        result1.addEventListener("input", updateResult);

        function updateResult() {
            const value1 = parseFloat(input1.value) || 0;
            const value2 = parseFloat(input2.value) || 0;
            const value3 = parseFloat(input3.value) || 0;
            const value4 = parseFloat(input4.value) || 0;
            const value5 = parseFloat(input5.value) || 0;
            const value6 = parseFloat(result1.value) || 0;
            const value7 = parseFloat(input6.value) || 0;

            const calc1 = ((value2 - value1) * value3) + value4;
            const calc2 = (calc1 + value7) - value5;

            result1.value = calc1;
            result2.value = calc2;
        }
    </script>
</body>

</html>