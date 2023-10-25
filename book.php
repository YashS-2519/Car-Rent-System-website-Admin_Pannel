<?php
include('connection.php');
include('authentication.php');
if (isset($_GET['carBookid'])) {
    $carBookid = $_GET['carBookid'];
    $selectsql = "Select * from cars where id='" . $carBookid . "'";
    $selectresult = mysqli_query($conn, $selectsql);
    $selectdata = mysqli_fetch_array($selectresult);
    $customerBookid = $_GET['customerBookid'];

    $sql = "update customer set book = '" . $carBookid . "' where id='" . $customerBookid . "'";
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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Select a Car</a>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Available cars</th>
                <th scope="col">No.</th>
                <th scope="col">Fuel Type</th>
                <th scope="col">Distance</th>
                <th scope="col">Select Car</th>
            </tr>
        </thead>
        <tbody <?php
                $c = 1;
                $sql = "Select * from cars";
                $result = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($result)) {
                    $getdata = "select * from customer where book ='" . $data['id'] . "'";
                    $checkResult = mysqli_query($conn, $getdata);
                    $getdata = mysqli_num_rows($checkResult);
                    if ($getdata > 0) {
                        continue;
                    }
                ?> <tr>
            <th scope="row"><?php echo $c++ ?></th>
            <td><?php echo $data['model'] ?></td>
            <td><?php echo $data['number'] ?></td>
            <td><?php echo $data['fuel'] ?></td>
            <td><?php echo $data['distance'] ?></td>
            <td><a class="btn btn-outline-primary" href="finalBook.php?customerBookid=<?php echo $_GET['customerBookid'] ?>&carBookid=<?php echo $data['id'] ?>x" role="button"><i class="ri-add-line"></i></a></td>
            </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>