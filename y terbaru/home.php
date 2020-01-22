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
		<title>(E-tan) Elektronik Tanah</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
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
                    $query2 = "SELECT userEmail,id FROM user WHERE userEmail='$userEmail';";
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
					<li><a href="notifikasi.php?id=<?php echo $data2["id"] ?>">Notifikasi</a></li>
					<li><a href="../y%20terbaru/liputanbeta/registrasi.php?id=<?php echo $data2["id"] ?>">Tambah Barang</a></li>
					<li><a href="company.php?id=<?php echo $data2["id"] ?>">About Company</a></li>

					<li><a href="../logout.php">Logout</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/slide01.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Temukan kenyamanan dalam jual-beli tanah di <a href="https://templated.co">E-tan</a></p>
							<h2>Tanah Kavling</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide02.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Jual-beli tanah terpercaya dengan harga terbaik</p>
							<h2>Tanah + Bangunan</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide03.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Investasi untuk masa depan yang cerah</p>
							<h2>Tanah Kosong</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide04.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Miliki hunian yang nyaman untuk keluarga</p>
							<h2>Rumah Impian</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide05.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Kualitas yang tak diragukan lagi</p>
							<h2>Bangun Baru</h2>
						</header>
					</div>
				</article>
			</section>

		<!-- One -->
	
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">
						<?php
						$conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");						
						$sql = mysqli_query($conn, "SELECT * FROM user INNER JOIN barang ON user.id = barang.user_id where Status='1' LIMIT 3") or die (mysql_error($conn));
						while ($data = mysqli_fetch_array($sql))
						{
						?>
						<div>
							<div class="box">
								<div class="image fit">
									<?php echo "<img src='images/".$data['gambar']."'width='100px' height='500px'/>" ?> 
								</div>
								<div class="content">
									<header class="align-center">
										<h2><?php echo $data['tipe'] ?></h2>
									</header>
									<p style="color: #FFF;"><td>Lokasi 						:<?php echo $data['lokasi'] ?></td><br>
															<td>Luas Tanah	:<?php echo $data['luasTanah'] ?></td><br>	
															<td>Harga						:<?php echo $data['harga'] ?></td>
									</p>
									<footer class="align-center">
									<form method="get" action="tampilbarang.php"  enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $data2['id'] ?>">
									<input type="hidden" name="idbarang" value="<?php echo $data['idbarang'] ?>">
									<input type="submit" name="Baca" value="Baca">
									</form>	
									</footer>
								</div>
							</div>
						</div>
						<?php 
  						}
 						?>
					</div>
				</div>
			</section>
		
		<!-- Three -->

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