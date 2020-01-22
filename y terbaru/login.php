<?php
// Load file koneksi.php
// include "dbconfig.php";
// // Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
// // $Status = $_GET['Status'];
// $userEmail = trim($_GET['userEmail']);
// // Ambil Data yang Dikirim dari Form
// // $idbarang = $_POST['idbarang'];
// $conn= mysqli_connect("e-tan.khaff.com","khaff_our_etan","cahya123","khaff_our_etan");

// $sql2 = "SELECT id,userEmail,level FROM user WHERE userEmail='$userEmail'";
//     $query3 = mysqli_query($conn, $sql2);
//     $row = mysqli_fetch_array($query3);
    $userEmail='ulandari@gmail.com';
    // $level = $row['level'];
    // echo $level;
  echo $userEmail;
    // echo "<br>";
    // echo("Error description: " . mysqli_error($conn));
    // // Proses ubah data ke Database
    
    // if($level=='2'){ // Cek jika proses simpan ke database sukses atau tidak
    //   // Jika Sukses, Lakukan :
        
       header("location: home.php?userEmail=$userEmail"); // Redirect ke halaman index.php
    // }else{
    //   // // Jika Gagal, Lakukan :
    //   // echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    //   // echo "<br><a href='edit.php'>Kembali Ke Form</a>";
    //     header("location: web/basic_table3.php?userEmail=$userEmail");
    // }
?>