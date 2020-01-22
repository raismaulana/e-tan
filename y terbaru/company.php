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

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Seputar Perusahaan</p>
						<h2>About Company</h2>
					</header>
				</div>
			</section>

		<!-- Main -->
			<div id="main" class="container">

				<!-- Elements -->
					<h2 id="elements">About E-tan</h2>
							<div style="text-align: center"><p>Tanah merupakan masalah konkrit yang ada di masyarakat. Banyak berita mengenai sengketa tanah yang sering menjadi masalah besar di dalam masyarakat. Selain itu, banyak masyarakat yang saat ini sedang gemar “membangun” demi mengikuti trend jaman sekarang. Sebagian dari masyarakat yang ingin membeli tanah masih bingung dalam mencari informasi, tidak tahu bagaimana proses transaksi dalam jual-beli tanah, bahkan ada yang malas jika harus berjumpa dengan makelar ataupun harus terjun ke lokasi tanah yang dibeli. Hal lain yang juga mempengaruhi ialah disaat ada seseorang yang telah membeli tanah yang dianggap kosong, ternyata tiba-tiba datang pemilik asli atau pewaris dari tanah tersebut.<br>
							<br>
							Seharusnya, masalah tanah dapat dipermudah dengan berkembang teknologi saat ini. Seperti halnya, jika ada masyarakat yang membeli tanah bisa mendapat informasi dengan mudah, transkasi jual-beli yang lebih ringkas dan juga saling menguntungkan kepada kedua belah pihak. Selain itu, penjualan tanah perlu kepercayaan antara pembeli dan penjual.<br>
							<br>
							Maka dari itu, kami mencoba mengurangi permasalahan tanah dengan aplikasi yang kami buat. E-Tan kami merupakan sebuah aplikasi yang mengandung sistem informasi yang dapat mempermudah dalam membeli lahan tanah ,dengan sistem saling percaya kami pastikan pembeli dapat mendapatkan lahan tanah tanpa proses yang rumit juga membantu penjual yang ingin menjual tanahnya.</p></div>


							<header class="align-center">
						<h2>Terms and Conditions</h2>
					</header>

							<ul style="list-style-type:square">
						<li>Web E-tan ini hanya sebagai "jembatan" antara penjual dan pembeli,</li>
							<li>Deal harga merupakan kesepakatan antara penjual dan pembeli tanpa ada pihak ketiga dari,</li>
							<li>Data tanah maupun bangunan yang ingin dijual harus asli dan sesuai dengan fakta. Jika tidak sesuai, maka admin berhak menghapus konten yang Anda jual,</li>
							<li>Tim verifikasi akan memverifikasi data barang (tanah dan bangunan) yang Anda jual secara langsung,</li>
							<li>Jika Anda 3 kali menjual tanah maupun bangunan tidak sesuai dengan fakta, maka E-tan akan memberi peringatan. Namun, jika telah 5 kali maka admin akan memblokir akun Anda.</li>
							<li>Pembeli akan bernegosiasi secara langsung dengan penjual mengenai barang yang akan dibeli.</li>
							<li>Setiap barang yang telah dipesan oleh pembeli akan berubah status menjadi "Sudah Dipesan". Namun, apabila hingga 7x24 jam barang belum laku terjual (Pembeli tidak memberi kepastian untuk membeli barang yang telah dipesan), maka status barang tersebut akan berubah menjadi tombol "Pesan" atau belum ada yang memesan.</li>
							<li>Dengan menekan tombol sign up, berarti Anda telah menyetujui semua persyaratan di atas. </li></ul>

					</div>
				</div>
			</div>
					

							

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