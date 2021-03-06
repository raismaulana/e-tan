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
                    $id = trim($_GET['id']);
                    $userEmail2=$data2['userEmail'];
                    $userEmail2 = trim($_GET['userEmail']);
                ?>
			<nav id="menu">
				<ul class="links">
					<li><a href="home.php?userEmail=<?php echo $data2["userEmail"] ?>" >Beranda</a></li>
					<li><a href="generic.php?id=<?php echo $data3["id"] ?>">Informasi</a></li>
					<li><a href="cari.php?id=<?php echo $data2["id"] ?>">Pencarian</a></li>
					<li><a href="pesanan.php?id=<?php echo $data2["id"] ?>">Tanah Yang di Pesan</a></li>
					<li><a href="notifikasi.php?id=<?php echo $data2["id"] ?>">Notifikasi</a></li>
					<li><a href="../y%20terbaru/liputanbeta/registrasi.php?id=<?php echo $data2["id"] ?>">Tambah Barang</a></li>
					<li><a href="company.php?id=<?php echo $data3["id"] ?>">About Company</a></li>

					<li><a href="../logout.php">Logout</a></li>
				</ul>
			</nav>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>cek barang yang telah anda pesan di sini</p>
						<h2>PEMESANAN TANAH DAN BANGUNAN</h2>
					</header>
				</div>
			</section>

		<!-- Main -->
		<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<div class="table-wrapper">
							<table >
								<tr>
								 <th> Tanggal Pemesanan </th>
								 <th> Lokasi </th>
								 <th> Harga </th>
								 <th> Tipe </th>
								  <th>Action</th>
								  </tr>
									<?php
									$user_id= $id;
				                    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
				                    
									
								   $conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");

								   $query3 = "SELECT pemesanan.TanggalPesan, barang.lokasi, barang.harga, barang.tipe ,barang.idbarang FROM barang  INNER JOIN pemesanan ON pemesanan.barang_idbarang=barang.idbarang 
								   WHERE pemesanan.user_id='$user_id' AND barang.Status='2'";
								   $query4 = "SELECT barang_idbarang from pemesanan WHERE user_id='$user_id';";
								   $sql4 = mysqli_query($conn, $query4);
								   $data4 = mysqli_fetch_array($sql4);
								   $idbarang = $data4['barang_idbarang'];
				                    $sql3 = mysqli_query($conn, $query3);
									   while($data3 = mysqli_fetch_array($sql3)) {

									   ?>
									   <tr>
									   	
								    <td style="color: #FFF;"><?php echo $data3['TanggalPesan'] ?></td>
								    <td style="color: #FFF;"><?php echo $data3['lokasi'] ?></td>
								    <td style="color: #FFF;"><?php echo $data3['harga'] ?></td>
								    <td style="color: #FFF;"><?php echo $data3['tipe'] ?></td>
								    <!--Hanya pemanis tampilan-->
								    <td>
								    <form method="get" action="tampilbarang3.php" enctype="multipart/form-data">
								                    		<input type="hidden" name="id" value="<?php echo $id ?>">
															<input type="hidden" name="idbarang" value="<?php echo $idbarang ?>">
															<input type="submit" value="proses" name="proses">	
															
								    </form>
								</td>
								   </tr>
									  <?php 

									  } 
									 
									?>					   
								 </table>
								</div>
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
				<div class="copyright" >
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