<?php
include('connection.php');
include('authentication.php');
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $sql = "delete from customer where id ='" . $delid . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
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
    <title>Coustomers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="font.css">
    <style>
        .dot {
            display: inline-block;
            height: 10px;
            width: 10px;
            position: relative;
            top: -17px;
            right: 5px;
            border-radius: 50%;
            background-color: green;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Coustomers</a>
            <a class="btn btn-sm btn-outline-secondary" href="addCoustomer.php" role="button">Add new</a>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Pending Amount</th>
                <th scope="col">Book a Car</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $c = 1;
            $sql = "Select * from customer";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th><?php echo $c++ ?></th>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['mobile'] ?></td>
                    <td><a href="editCoustomer.php?editid=<?php echo $data['id'] ?>" role="button"><i class="ri-pencil-line btn"></i></a></td>
                    <td><a href="coustomers.php?delid=<?php echo $data['id'] ?>" role="button"><i class="ri-delete-bin-line btn" onclick="return confirm('Do you want to delete?')"></i></a></td>

                    <?php
                    if ($data['pending'] > 0) {
                    ?>
                        <td><a title="Pay" href="pay.php?payid=<?php echo $data['id'] ?>"><?php echo $data['pending'] ?> ₹</a></td>
                    <?php
                    } else {
                    ?>
                        <td><?php echo $data['pending'] ?> ₹</td>
                    <?php
                    }
                    if ($data['book']) {
                        $car = "Select * from cars where id='" . $data['book'] . "'";
                        $carResult = mysqli_query($conn, $car);
                        $carData = mysqli_fetch_array($carResult);
                    ?>
                        <td><a title="Return Car- <?php if ($carData) echo $carData['model'] ?>" class="btn btn-warning" href="returnCar.php?carid=<?php echo $carData['id'] ?>&customerid=<?php echo $data['id'] ?>" role="button"><i class="ri-roadster-line"></i></a><?php if ($data['book'] > 0) echo '<span class="dot"></span>' ?></td>
                    <?php
                    } else {
                    ?>
                        <td><a title="Book a car" class="btn btn-outline-primary" href="book.php?customerBookid=<?php echo $data['id'] ?>" role="button"><i class="ri-roadster-line"></i></a><?php if ($data['book'] > 0) echo '<span class="dot"></span>' ?></td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>