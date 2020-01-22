<?php
// Load file koneksi.php
include "koneksi.php";
$conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$Status = $_GET['Status'];
$idbarang = $_GET['idbarang'];
// Ambil Data yang Dikirim dari Form
$idbarang = $_POST['idbarang'];
$Status = $_POST['Status'];

    
    // Proses ubah data ke Database
    $query = "UPDATE barang SET idbarang='$idbarang', Status='$Status' WHERE idbarang='$idbarang '";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: basic_table3.php"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='edit.php'>Kembali Ke Form</a>";
    }
?>