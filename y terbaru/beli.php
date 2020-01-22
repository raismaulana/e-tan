<?php
// Load file koneksi.php
include "koneksi.php";
$conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
// $Status = $_GET['Status'];
$idbarang = $_GET['idbarang'];
// Ambil Data yang Dikirim dari Form
// $idbarang = $_POST['idbarang'];
$sql2 = "SELECT Status
    FROM pemesanan WHERE barang_idbarang='$idbarang'";
    $query3 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($query3);
    $Status=$row['Status'];
    $Status = 3;
	echo $Status;
    echo "<br>";
    echo("Error description: " . mysqli_error($conn));
    // Proses ubah data ke Database
     $query = "UPDATE barang SET  Status='$Status' WHERE idbarang='$idbarang '";
     $query2= "DELETE FROM pemesanan WHERE barang_idbarang='$idbarang'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
    $sql3= mysqli_query($conn,$query2);
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: tampilbarang4.php?idbarang=$idbarang"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='edit.php'>Kembali Ke Form</a>";
    }
?>