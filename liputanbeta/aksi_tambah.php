<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'koneksi.php';

// file submit.php
// menangkap data yang dikirimkan dari file tambah.php mwnggunakan method = POST

$KodeTanah = $_POST['kodeTanah'];
$LuasTanah = $_POST['luasTanah'];
$Lokasi = $_POST['lokasi'];
$Harga = $_POST['harga'];
$Sertifikat = Ada;
$gambar = $_FILES['gambar']['name'];
$gambarx = $_FILES['gambar']['tmp_name'];
$gambary = date('dmYHis').$gambar;
$path = "../images/".$gambary;
$PBB = Ada;
$IMB = Ada;
$HakTanggungan = Ada;
$TanggalInput            = date('Y-m-d H:i:s');
$Status	= $_POST['Status'];
$tipe = $_POST['tipe'];
$deskripsi = $_POST['deskripsi'];
$user_id = $_POST['id'];
// perintah SQL
                    // Load file koneksi.php
                    $conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");
$query2 = "SELECT userEmail,id FROM user WHERE id='$user_id';";
                    $sql2 = mysqli_query($conn, $query2);  // Eksekusi/Jalankan query dari variabel $query
                    $data2 = mysqli_fetch_array($sql2); // Ambil data dari hasil eksekusi $sql
            		$id=$data2['userEmail'];
                    $id = trim($_POST['userEmail']);
                    echo $id;
if(move_uploaded_file($gambarx, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO barang (kodeTanah, luasTanah, lokasi, harga, sertifikat, gambar, pbb, imb, hakTanggungan, tangalUpdate, Status, tipe, deskripsi, user_id)
	VALUES ('$KodeTanah', '$LuasTanah', '$Lokasi', '$Harga', '$Sertifikat', '$gambary', '$PBB', '$IMB', '$HakTanggungan', '$TanggalInput' ,'$Status','$tipe','$deskripsi','$user_id');";
	echo $query;
	echo "<br>";
	$link = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");
	$hasil = mysqli_query($link,$query);
	$conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");
$query2 = "SELECT userEmail,id FROM user WHERE id='$user_id';";
echo $query2;
                    $sql2 = mysqli_query($conn, $query2);  // Eksekusi/Jalankan query dari variabel $query
                    $data2 = mysqli_fetch_array($sql2); // Ambil data dari hasil eksekusi $sql
                    echo $data2['userEmail'];
            		
                    $userEmail = trim($data2['userEmail']);
                    echo $userEmail;
	if ($hasil){
header ('location:view.php');
	echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>";
 	header("location: ../home.php?userEmail=$userEmail;"); 
} 
	else { echo "Data gagal disimpan
 	<meta http-equiv='refresh' content='2; url= registrasi.php'/> ";
}
}
else{
	// Jika gambar gagal diupload, Lakukan :
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='registrasi.php'>Kembali Ke Form</a>";
}
?>