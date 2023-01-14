<?php
session_start();
$username = $_SESSION['username'];
$level = $_SESSION['level'];
if (!isset($username)) {
    header('location:index.php');
}
if ($level != 'ADMIN') {
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
            <a class="navbar-brand" href="halaman_admin.php"><?php echo $_SESSION['username'] ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="output_konsultasi.php">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="output_pengalaman.php">Pengalaman</a>
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
        <h2 class="text-center">PENGADUAN WARGA</h2>
        <p class="text-center">Daftar konsultasi warga yang sudah mengisi di halaman warga</p>
    </div>
    <!-- Jumbotron -->
    <!-- Table -->
    <div class="container">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-secondary text-light">
                <?php
                include "koneksi.php";
                echo "<tr>";
                echo "<th class='w-50'>Identitas</th>";
                echo "<th>Pengaduan</th>";
                echo "</tr>";
                echo "</thead>";
                $tampil = mysqli_query($conn, "SELECT * FROM konsultasi");
                foreach ($tampil as $row) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='d-flex align-items-center'>";
                    echo "<div class='ms-3'>";
                    echo "<p class='fw-bold mb-1'>" . $row["nama"] . "</p>";
                    echo "<p class='text-muted mb-0'>" . $row["email"] . " </p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</td>";
                    echo "<td>";
                    echo "<p class='fw-normal mb-1'>". $row['konsul'] ."</p>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
        </table>

    </div>
</body>

</html>