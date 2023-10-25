<?php
include('connection.php');
include('authentication.php');
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    $sql = "insert into customer (name,mobile) values ('".$name."','".$mobile."')";
    $result = mysqli_query($conn, $sql);

    if($result){
      header('location:coustomers.php');
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
    <a class="navbar-brand" href="#">Add Coustomer</a>
  </div>
</nav>
    <div class="container">
        <form class="mt-5" action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" required name="name" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile No.</label>
                <input type="number" required class="form-control" name="mobile" id="mobile">
                <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>