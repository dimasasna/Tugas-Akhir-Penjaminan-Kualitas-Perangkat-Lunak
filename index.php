<?php
session_start();
$error = "";
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        $error = "Gagal Login, Username atau Password Salah";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DESA BALANTANG</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <!-- Section: Design Block -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5 bg-light">

                    <form class="card-body cardbody-color p-lg-4" action="auth.php" method="POST">
                        <h3 class="text-center text-dark">Sign In</h3>
                        <div class="text-center text-dark">Website Desa Balantang Uji Coba Selenium</div>
                        <div class="text-center">
                            <img src="balantang.png" class="img-fluid profile-image-pic img-thumbnail  my-3" width="200px" alt="profile">
                        </div>
                        <?php
                        if ($error) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                        </div>
                        <?php
                        header("refresh:2;url=index.php");
                        }
                        ?>
                        <div class="mb-3">
                            <input name="username" type="text" class="form-control" id="Username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input name="password" type="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary px-5 mb-5 w-100">Login</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Created by Dimas Asna Nugraha <a href="https://www.instagram.com/dimasasna/" class="text-dark fw-bold"> Social Media?</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>