<?php
// Load file koneksi.php
include "koneksi.php";
$conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
// $Status = $_GET['Status'];
// Ambil Data yang Dikirim dari Form
    $idbarang = $_GET['idbarang'];
    $sql = "SELECT Status 
    FROM barang WHERE idbarang='$idbarang'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $Status=$row['Status'];
    echo $Status;
    echo $idbarang;
    if($Status=='1'){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: tampilbarang.php?idbarang=$idbarang"); // Redirect ke halaman index.php
    }elseif ($Status=='2') {
      header("location: tampilbarang2.php?idbarang=$idbarang");
    }
    elseif ($Status=='3') {
      header("location: tampilbarang4.php?idbarang=$idbarang");
    }
?>