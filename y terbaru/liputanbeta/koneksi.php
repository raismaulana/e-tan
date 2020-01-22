<?php
$servername = "e-tan.khaff.com";
$database = "khaff_our_etan";
$username = "khaff_our_etan";
$password = "cahya123";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_close($conn);
?>