<?php
include('connection.php');
include('authentication.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="font.css">
    <style>
        * {
            overflow: hidden;
        }

        th {
            height: 10vh;
            text-align: center;
            vertical-align: top;
            font-size: larger;
        }

        iframe {
            height: 87.3vh;
            width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="ri-admin-line"></i>
                <?php echo $_SESSION['name'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Switch User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="addAdmin.php">Add User</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a href="logOut.php" class="btn btn-outline-danger" type="submit">Log Out</a>
                </form>
            </div>
        </div>
    </nav>
    <div>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="owner.php" target="scr">Owners</a></th>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="coustomers.php" target="scr">Coustomers</a></th>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="cars.php" target="scr">Cars</a></th>
                                </tr>
                                <!-- <tr>
                                    <th scope="row"><a href="Transictions.php" target="scr">Transictions</a></th>
                                </tr> -->
                            </tbody>
                        </table>
                    </th>
                    <td scope="col" rowspan="4">
                        <iframe src="coustomers.php" width="500px" height="500px" frameborder="0" name="scr" allowfullscreen></iframe>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>