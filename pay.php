<?php
include('connection.php');
include('authentication.php');

$customerid = $_GET['payid'];
$customerSql = "Select * from customer where id='" . $customerid . "'";
$customerResult = mysqli_query($conn, $customerSql);
$customerData = mysqli_fetch_array($customerResult);

if (isset($_POST['submit'])) {
    $pending = $_POST['pending'];
    $sql = "Update customer set pending='" . $pending . "' where id='" . $customerid . "'";
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
            <a class="navbar-brand" href="#">Pay</a>
        </div>
    </nav>
    <div class="container">
        <form class="mt-5" method="post">
            <fieldset disabled>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Name</label>
                    <input type="text" required id="disabledTextInput" class="form-control" value="<?php echo $customerData['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Mobile</label>
                    <input type="text" required id="disabledTextInput" class="form-control" value="<?php echo $customerData['mobile'] ?>">
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="prepending" class="form-label">Previous Pending</label>
                <input type="number" required readonly value="<?php echo $customerData['pending'] ?>" class="form-control" id="prepending">
            </div>
            <div class="mb-3">
                <label for="Pay" class="form-label">Pay</label>
                <input type="number" required class="form-control" id="Pay">
            </div>
            <div class="mb-3">
                <label for="pending" class="form-label">Remains</label>
                <input type="number" name="pending" required readonly class="form-control" id="pending">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        const input1 = document.getElementById('prepending');
        const input2 = document.getElementById('Pay');
        const result = document.getElementById('pending');


        input1.addEventListener('input', updateResult);
        input2.addEventListener('input', updateResult);


        function updateResult() {
            const value1 = parseFloat(input1.value) || 0;
            const value2 = parseFloat(input2.value) || 0;
            result.value = value1 - value2;
        }





    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>