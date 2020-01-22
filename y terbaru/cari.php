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

					<li><a href="../logout.php">Logout</a></li>
				</ul>
			</nav>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Temukan Barang yang Anda Cari di Sini</p>
						<h2>PENCARIAN</h2>
					</header>
				</div>
			</section>
		<!-- Main -->
			<div id="main" class="container">

				<!-- Elements -->
					<h2 id="elements">Pencarian</h2>
					<form action="" method="get" name="form1">
				<div class="inner">
					<div class="box">
						<div class="content">
							<div class="">
								
									<table>
											<tr width>
												<th ><input type="text" name="harga1" placeholder="Kisaran harga" style="width: 450px;"></th>
										         <th style="text-align: left;" >sampai dengan</th>
										         <th style="text-align: left;">
												<input type="text" name="harga2" placeholder="Kisaran harga" style="width: 450px;"></th>
										         </th>
											</tr>
											<tr width>
												<th ><input type="text" name="lokasi" placeholder="Lokasi" style="width: 450px;"></th>
										         </th>
										         <th></th>
										         <th style="text-align: left;"> <select id="right-label" name="tipe" style="width: 450px;">
										         		<option value=""><----pilih tipe tanah anda----></option>
										               	<option value="Tanah Kavling">Tanah Kavling</option>
										                <option value="Tanah Kosong">Tanah Kosong</option>
										                <option value="Tanah + Bangunan">Tanah + Bangunan</option>
										              </select>
										         </th>
											</tr>
											<tr>
												<th></th>
												<th>
													<div class="3u$ 12u$(small)">
														<input type="hidden" name="id" value='<?php echo $data3['id'] ?>'>
														<input type="submit" value="Search" name="search"/>
													</div>
												</th>
												<th></th>

											</tr>
									</table>
								</div>
						</div>
					</div>
				</div>
			</form>
						<div class="table-wrapper">
							<table >
								<tr>
								 <th> Luas Tanah </th>
								 <th> Lokasi </th>
								 <th> Harga </th>
								 <th> Tipe </th>
								  <th>Action</th>
								  </tr>
								  <?php
								    if(isset($_GET['search'])){
								        $conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");								
								        $id=$_GET['id'];        	
								        $LOKASI = $_GET['lokasi'];
								        	if (empty($LOKASI)) {
								        		# code...
								        		$sql=0;
								        	}
								            else{
								            	$sql = "select * from barang where lokasi like '%$LOKASI%'";
								            	$result = mysqli_query($conn,$sql);
								        		if(mysqli_num_rows($result) > 0){
								            	?>
								                <?php
								                while($siswa = mysqli_fetch_array($result)){?>
								                <tr>
								                	<td><?php echo $siswa['luasTanah'];?></td>
								                    <td><?php echo $siswa['lokasi'];?></td>
								                    <td><?php echo $siswa['harga'];?></td>
								                    <td><?php echo $siswa['tipe'];?></td> 
								                    <td>
								                    	<form method="get" action="" enctype="multipart/form-data">
								                    		<input type="hidden" name="id" value="<?php echo $id ?>">
															<input type="hidden" name="idbarang" value="<?php echo $siswa['idbarang'] ?>">
															<input type="submit" value="post" name="post">	
															
								                    		</form>
								                    </td>
								                </tr>
								                <?php }?>
								            
								            <?php
								        }else{
								            echo '<center><p style="font-size: 30pt;color: red;">Tidak Ada Dalam Pencarian</p></center>'; 
								        }
								            }
								            // echo $LOKASI;
								            // echo "<br>";
								            
								             
								    }
								    if(isset($_GET['search'])){
								    	 $conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");								            $JENISBANGUNAN = $_GET['tipe'];
								    	 $id=$_GET['id'];
								            if (empty($JENISBANGUNAN)) {
								        		# code...
								        		$sql =0;
								        	}
								            else{
								            	$sql = "select * from barang where tipe like '%$JENISBANGUNAN%'";
								            	 $result = mysqli_query($conn,$sql);
								        if(mysqli_num_rows($result) > 0){
								            ?>
								                <?php
								                while($siswa = mysqli_fetch_array($result)){?>
								                <tr>
								                	<td><?php echo $siswa['luasTanah'];?></td>
								                    <td><?php echo $siswa['lokasi'];?></td>
								                    <td><?php echo $siswa['harga'];?></td>
								                    <td><?php echo $siswa['tipe'];?></td>
								 		            <td>
								                    	<form method="get" action="" enctype="multipart/form-data">
								                    		<input type="hidden" name="id" value="<?php echo $id ?>">
															<input type="hidden" name="idbarang" value="<?php echo $siswa['idbarang'] ?>">
															<input type="submit" value="post" name="post">	
															
								                    		</form>
								                    </td>
								                </tr>
								                <?php }?>
								            
								            <?php
								        }

								            }
								            
								            // echo $JENISBANGUNAN;
								            // echo "<br>";
								            
								           
								    }
								    if(isset($_GET['search'])){
								    	 $conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");
								             $harga1 = $_GET['harga1'];
								            $harga2 = $_GET['harga2'];
								            $id=$_GET['id'];
								            // echo $JENISBANGUNAN;
								            // echo "<br>";
								            if (empty($harga2)) {
								        		# code...
								        		$sql =0;
								        	}
								            else{
								            	$sql = "SELECT * FROM barang
											WHERE harga  between '$harga1'+0 and '$harga2'+0";
											 $result = mysqli_query($conn,$sql);
								        if(mysqli_num_rows($result) > 0){
								            ?>
								                <?php
								                while($siswa = mysqli_fetch_array($result)){?>
								                <tr>
								                	<td><?php echo $siswa['luasTanah'];?></td>
								                    <td><?php echo $siswa['lokasi'];?></td>
								                    <td><?php echo $siswa['harga'];?></td>
								                    <td><?php echo $siswa['tipe'];?></td>
													<td><form method="get" action="" enctype="multipart/form-data">
								                    		<input type="hidden" name="id" value="<?php echo $id ?>">
															<input type="hidden" name="idbarang" value="<?php echo $siswa['idbarang'] ?>">
															<input type="submit" value="post" name="post">	
															
								                    		</form>
								                    </td>
								                </tr>
								                <?php }?>
								            
								            <?php
								        }
								            }
								            
								           
								    }
								    ?>
								    <?php
								    if (isset($_GET['post'])) {
								    	# code...

									// Load file koneksi.php
									include "koneksi.php";
									$conn = mysqli_connect("e-tan.khaff.com", "khaff_our_etan", "cahya123", "khaff_our_etan");// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
									// $Status = $_GET['Status'];
									// Ambil Data yang Dikirim dari Form
										$id2 = $_GET['id'];
									    $idbarang = $_GET['idbarang'];
									    $sql = "SELECT Status 
									    FROM barang WHERE idbarang='$idbarang'";
									    $query = mysqli_query($conn, $sql);
									    $row = mysqli_fetch_array($query);
									    $Status=$row['Status'];
									    echo $Status;
									    echo $idbarang;
									    if($Status=='1'){ // Cek jika proses simpan ke database sukses atau tidak
									      // Jika Sukses, Lakukan :
									      header("location: tampilbarang.php?id=".$id2."&idbarang=".$idbarang.""); // Redirect ke halaman index.php
									    }elseif ($Status=='2') {
									      header("location: tampilbarang2.php?id=".$id2."&idbarang=".$idbarang."");
									    }
									    elseif ($Status=='3') {
									      header("location: tampilbarang4.php?id=".$id2."&idbarang=".$idbarang."");
    }

								    }
								    ?>

								   
								 </table>
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