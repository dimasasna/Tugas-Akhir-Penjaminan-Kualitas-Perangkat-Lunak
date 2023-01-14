<?php
session_start();
$username = $_SESSION['username'];
$level = $_SESSION['level'];
if (!isset($username)) {
    header('location:index.php');
}
if ($level != 'USER') {
    echo '<script type ="text/JavaScript">';
    echo 'alert("Akses ditolak")';
    echo '</script>';
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>DESA BALANTANG</title>
</head>

<body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><?php echo $_SESSION['username'] ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link mx-2 active" aria-current="page" href="konsultasi.php">Pengaduan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="pengalaman.php">Pengalaman</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link mx-2 bg-warning text-dark" href="logout.php">Logout</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->


        <!-- Jumbotron -->
        <div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
            <h2>Hello <?php echo $username ?></h2>
            <p>
                Ini adalah website desa balantang tapi ingat ini tidak resmi, ini hanyalah buatan dari saya sendiri untuk uji perangkat lunak otomatis menggunakan selenium
            </p>

            <hr class="my-4" />

            <p>
                Button dibawah ini tidak berfungsi ya hehe
            </p>
            <button type="button" class="btn btn-primary">
                Learn More
            </button>
        </div>
        <!-- Jumbotron -->

        
</body>

</html>