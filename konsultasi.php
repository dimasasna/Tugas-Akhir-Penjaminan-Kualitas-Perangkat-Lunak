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
$sukses = "";
$gagal = "";

// INSERT DATA
include "koneksi.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $konsul = $_POST['konsul'];
    $email = $_POST['email'];
    if ($nama && $email && $konsul) {
        $sql = "INSERT INTO konsultasi (nama, email, konsul) VALUES ('$nama', '$email', '$konsul')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $sukses = "Berhasil Input, Terimakasih :)";
        }
    } else {
        $gagal = "Silahkan Masukan Semua Data :)";
    }
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
            <a class="navbar-brand" href="halaman_user.php"><?php echo $_SESSION['username'] ?></a>
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
        <h2 class="text-center">PENGADUAN WARGA</h2>
    </div>
    <!-- Jumbotron -->
    <!-- form -->
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:1.5;url=konsultasi.php");
                }
                ?>
                <?php
                if ($gagal) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $gagal ?>
                    </div>
                <?php
                    header("refresh:1.5;url=konsultasi.php");
                }
                ?>
                <nav class="navbar mb-3 bg-info">
                    &nbsp;&nbsp; Input Pengaduan
                </nav>
                <form method="post">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example1">Nama</label>
                        <input name="nama" type="text" id="form4Example1" class="form-control" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Email address</label>
                        <input name="email" type="email" id="form4Example2" class="form-control" />

                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example3">Ceritakan Pengaduan</label>
                        <textarea name="konsul" class="form-control" id="form4Example3" rows="4"></textarea>

                    </div>

                    <!-- Submit button -->
                    <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Send</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end form -->
</body>

</html>