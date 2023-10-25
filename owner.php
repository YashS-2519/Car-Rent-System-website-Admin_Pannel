<?php
include('connection.php');
include('authentication.php');

if (isset($_GET['delidOwner']) and isset($_GET['delidCar'])) {
    $delidOwner = $_GET['delidOwner'];
    $delidCar = $_GET['delidCar'];
    $sqlOwner = "delete from owners where id ='" . $delidOwner . "'";
    $sqlCar = "delete from cars where id = '".$delidCar."'";
    $resultOwner = mysqli_query($conn, $sqlOwner);
    $resultCar = mysqli_query($conn, $sqlCar);
    if ($resultOwner and $resultCar) {
    } else {
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
    <title>Owners</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Owners</a>
            <a class="btn btn-sm btn-outline-secondary" href="addOwner.php" role="button">Add new</a>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Car's Model</th>
                <th scope="col">Car's Number</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $c = 1;
            $sql = "Select * from owners";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($result)) {
                $car = "Select * from cars where owner='".$data['id']."'";
                $carResult = mysqli_query($conn, $car);
                $carData = mysqli_fetch_array($carResult);
            ?>
                <tr>
                    <th><?php echo $c++ ?></th>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['mobile'] ?></td>
                    <td><?php echo $carData['model'] ?></td>
                    <td><?php echo $carData['number'] ?></td>
                    <td><a href="editOwner.php?editidOwner=<?php echo $data['id'] ?>&editidCar=<?php echo $carData['id'] ?>" role="button"><i class="ri-pencil-line btn"></i></a></td>
                    <td><a href="owner.php?delidOwner=<?php echo $data['id'] ?>&delidCar=<?php echo $carData['id'] ?>" role="button"><i class="ri-delete-bin-line btn" onclick="return confirm('Do you want to delete?')"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>