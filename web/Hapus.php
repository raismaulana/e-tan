<?php
error_reporting(0);
// Load file koneksi.php
include "koneksi.php";
$conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");
// Ambil data NIS yang dikirim oleh index.php melalui URL
$idbarang = $_GET['idbarang'];

// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
$query = "SELECT * FROM barang WHERE idbarang='".$idbarang."'";
$sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

// Cek apakah file fotonya ada di folder images
//if(is_file("images/".$data['Foto'])) // Jika foto ada
 // unlink("images/".$data['Foto']); // Hapus foto yang telah diupload dari folder images

// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$query2 = "DELETE FROM barang WHERE idbarang='".$idbarang."'";
$sql2 = mysqli_query($conn, $query2); // Eksekusi/Jalankan query dari variabel $query

if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: basic_table3.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='basic_table3.php'>Kembali</a>";
}
?>