<?php
include 'koneksi.php';
session_start();
require_once '../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('../index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM user WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>(E-Tan) Elektronik Tanah</title>
		<link rel="shortcut icon" href="../images/favicon.ico">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
		ul.putih{
			color: #fff;
		}</style>
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo">E-tan <span>Elektronik Tanah</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<?php
                    error_reporting(0);
                    // Load file koneksi.php
                    include "koneksi.php";
                    $conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");                    // Ambil data NIS yang dikirim oleh index.php melalui URL
                    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
                    $id=$_GET['id'];
                    $userEmail=$_GET['userEmail'];
                    $query2 = "SELECT userEmail,id FROM user WHERE id='$id';";
                    $sql2 = mysqli_query($conn, $query2);  // Eksekusi/Jalankan query dari variabel $query
                    $data2 = mysqli_fetch_array($sql2); // Ambil data dari hasil eksekusi $sql

            		$id=$data2['id'];
                    $id = trim($_POST['id']);
                    $userEmail2=$data2['userEmail'];
                    $userEmail2 = trim($_GET['userEmail']);
                ?>
			<nav id="menu">
				<ul class="links">
					<li><a href="home.php?userEmail=<?php echo $data2["userEmail"] ?>" >Beranda</a></li>
					<li><a href="generic.php?id=<?php echo $data2["id"] ?>">Informasi</a></li>
					<li><a href="cari.php?id=<?php echo $data2["id"] ?>">Pencarian</a></li>
					<li><a href="pesanan.php?id=<?php echo $data2["id"] ?>">Tanah Yang di Pesan</a></li>
					<li><a href="../y%20terbaru/liputanbeta/registrasi.php?id=<?php echo $data2["id"] ?>">Tambah Barang</a></li>
					<li><a href="company.php?id=<?php echo $data2["id"] ?>">About Company</a></li>

					<li><a href="../logout.php">Logout</a></li>
				</ul>
			</nav>


		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>FAQ (Frequency Ask Question)</p>
						<h2>Pertanyaan yang Sering Ditanyakan</h2>
					</header>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p style="color: #FFF;">Silahkan Baca dengan Seksama</p>
								<!-- <h2>Tata Cara dalam Membeli Tanah</h2> -->
							</header>
							<h2 id="elements"><b>Tata cara membeli tanah &nbsp:</b></h2>
							<ul type="square" class="putih">
							<li>Anda harus terdaftar dahulu di web E-tan, dengan cara masuk ke menu Login -> Sign Up. Atau masuk ke link e-tan.khaff.com, lalu tekan sign up,</li>
							<li>Masukkan data sesuai dengan sesuai blanko yang sediakan. Pastikan data yang Anda masukkan 100% benar,</li>
							<li>Setelah terdaftar, silahkan Anda cari barang (tanah maupun bangunan) yang ingin Anda beli,</li>
							<li>Jika sudah menemukan barang yang ingin dibeli, klik tombol "Pesan" hingga status barang yang Anda pesan berubah menjadi "Sudah Dipesan",</li>
							<li>Penjual akan menghubungi Anda dalam kurun waktu 7x24 jam. Jika Penjual tidak menghubungi Anda, maka status barang yang Anda beli akan hilang,</li>
							<li>Anda silahkan bernegosiasi mengenai harga dan barang dengan penjual melalui hubungan yang telah terjalin.</li></ul>

							<h2 id="elements"><b>Tata cara menjual tanah &nbsp:</b></h2>
							<ul type="square" class="putih">
							<li>Anda harus terdaftar dahulu di web E-tan, dengan cara masuk ke menu Login -> Sign Up. Atau masuk ke link e-tan.khaff.com, lalu tekan sign up,</li>
							<li>Masukkan data sesuai dengan sesuai blanko yang sediakan. Pastikan data yang Anda masukkan 100% benar,</li>
							<li>Masuk ke menu Tambah Barang. Kemudian, isi blanko yang tersedia,</li>
							<li>Data barang yang telah Anda masukkan tidak akan langsung muncul di halaman awal. Karena, data tersebut akan diverifikasi terlebih dahulu oleh Tim verifikasi E-tan yang terjun langsung ke lapangan,</li>
							<li>Setelah data barang yang Anda masukkan sesuai dengan fakta, barang yang Anda jual akan muncul di halaman awal,</li>
							<li>Apabila barang yang Anda jual telah dipesan, maka akan ada notifikasi yang masuk melalui email Anda,</li>
							<li>Selanjutnya, Anda harus menghubungi pembeli yang telah memesan barang Anda. Tidak ada keharusan untuk menggunakan satu media (WhatsApp/Email/Telpon),</li>
							<li>Akan ada tampilan yang menanyakan apakah barang Anda telah terjual selama 7x24 jam disaat Anda membuka data barang Anda,</li>
							<li>Apabila barang Anda terjual, klik tomboh "Sudah". Apabila belum, klik "Belum",</li>
							<li>Namun, jika 7x24 jam tidak ada konfirmasi dari Anda. Maka, status barang Anda yang semula "Sudah Dipesan" akan berubah menjadi tombol "Pesan" seperti sedia kala.</li></ul>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="https://www.facebook.com/Elektronik-Tanah-892540144247065/?modal=admin_todo_tour" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/elektronik.tanah/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						
					</ul>
				</div>
				<div class="copyright">
					&copy; E-tan| copyright 2017
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>