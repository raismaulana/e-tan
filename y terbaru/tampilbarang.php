<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>(E-Tan) Elektronik Tanah</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo">E-tan <span>Elektronik Tanah</span></div>
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
                    $query3 = "SELECT userEmail,id FROM user WHERE id='$id';";
                    $sql3 = mysqli_query($conn, $query3);  // Eksekusi/Jalankan query dari variabel $query
                    $data3 = mysqli_fetch_array($sql3); // Ambil data dari hasil eksekusi $sql

            		$id=$data3['id'];
                    $id = trim($_POST['id']);
                    $userEmail2=$data3['userEmail'];
                    $userEmail2 = trim($_GET['userEmail']);
                ?>
              
			<nav id="menu">
				<ul class="links">
					<li><a href="home.php?userEmail=<?php echo $data3["userEmail"] ?>" >Beranda</a></li>
					<li><a href="generic.php?id=<?php echo $data3["id"] ?>">Informasi</a></li>
					<li><a href="cari.php?id=<?php echo $data3["id"] ?>">Pencarian</a></li>
					<li><a href="pesanan.php?id=<?php echo $data3["id"] ?>">Tanah Yang di Pesan</a></li>
					<li><a href="notifikasi.php?id=<?php echo $data3["id"] ?>">Notifikasi</a></li>
					<li><a href="../y%20terbaru/liputanbeta/registrasi.php?id=<?php echo $data3["id"] ?>">Tambah Barang</a></li>
					<li><a href="company.php?id=<?php echo $data3["id"] ?>">About Company</a></li>

					<li><a href="">Logout</a></li>
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

				<?php
                    error_reporting(0);
                    // Load file koneksi.php
                    include "koneksi.php";
                    $conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");                    // Ambil data NIS yang dikirim oleh index.php melalui URL
                    $idbarang= $_GET['idbarang'];
  					$user_id= $_GET['user_id'];
                    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
                 	// Ambil data dari hasil eksekusi $sql
                    $query2 = "SELECT * FROM user INNER JOIN barang ON user.id = barang.user_id WHERE idbarang='$idbarang';";
                    $sql2 = mysqli_query($conn, $query2);  // Eksekusi/Jalankan query dari variabel $query
                    $data2 = mysqli_fetch_array($sql2); // Ambil data dari hasil eksekusi $sql
                    ?>
  <form method="get" action="tampilbarang2.php" enctype="multipart/form-data">	
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<?php echo "<img src='images/".$data2['gambar']."'width='100%' height='100%'/>" ?>
						</div>
					</div>
				</div>
			</section>
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">
						<div>
							<div class="box">
								<div class="content">
									<header class="align-center">
										<h2>Info Detail Tanah</h2>
									</header>
									<p style="color: #FFF;"><table>
									<tr>
										<th>Harga</th>
										<td style="color: #FFF;">:</td>
										<td style="color: #FFF;" ><?php echo $data2['harga']; ?></td>
									</tr>
									<tr>
										<th>Lokasi</th>
										<td style="color: #FFF;">:</td>
										<td style="color: #FFF;"><?php echo $data2['lokasi']; ?></td>
									</tr>
									<tr>
										<th>Tipe</th>
										<td style="color: #FFF;">:</td>
										<td style="color: #FFF;"><?php echo $data2['tipe'] ?></td>
									</tr>
									<tr>
										<th>Deskripsi</th>
										<td style="color: #FFF;">:</td>
										<td style="color: #FFF;"><?php echo $data2['deskripsi']; ?></td>
									</tr>
								</table>
									</p>
								</div>
							</div>
						</div>		
						<div>
							<div class="box">
								<div class="content">
									<header class="align-center">
										<h2>Contach Person</h2>
									</header>
									<p style="color: #FFF;"><table>
									<tr>
										<th>Nama Lengkap</th>
										<td style="color: #FFF;">:</td>
										<td style="color: #FFF;"><?php echo $data2['nama']; ?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td style="color: #FFF;">:</td>
										<td style="color: #FFF;"><?php echo $data2['userEmail']; ?></td>
									</tr>

									<tr>
										<th>Nomor Telepon</th>
										<td style="color: #FFF;">:</td>
										<td style="color: #FFF;"><?php echo $data2['noTelp'] ?></td>
									</tr>
								</table>
									</p>
									<footer class="align-center">
										<input type="hidden" name="id" value="<?php echo $data3['id'] ?>">
										<input type="hidden" name="idbarang" value="<?php echo $data2['idbarang'] ?>">
										<input  type="submit" value="pesan" name="pesan" />
									</footer>
								</div>
							</div>
						</div>		
					</div>
				</div>
			</section>
</form>

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