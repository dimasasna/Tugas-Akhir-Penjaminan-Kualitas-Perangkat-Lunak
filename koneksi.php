<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'webprofil';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal Terhubung ke Database');
?>