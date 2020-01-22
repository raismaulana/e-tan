<?php
include 'koneksi.php';
session_start();
require_once '../../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
  $user_home->redirect('../../index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM user WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>(E-Tan) Elektronik Tanah</title>
    <link rel="shortcut icon" href="../../images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>

  <body>
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container"><a class="navbar-brand" href="../home.php?userEmail=<?php echo $data2["userEmail"] ?>">Kembali</a>
        <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button> -->
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/sawah2.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1 style="color: #FFF;">Form Pengisian Data Tanah</h1>
			
              <!-- <span class="subheading"><b>Form Pengisian Data Tanah</b></span> --></div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
              <p style="text-align: center;"><i>*Nb: Untuk Izin Mendirikan Bangunan(IMB), Pajak Bumi dan Bangunan(PBB), Hak Tanggungan dan Sertifikat Tanah harus ada!</i></p>
            
     <form method="POST" action="aksi_tambah.php" style="margin-top:30px;" enctype="multipart/form-data">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Kode Tanah</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="isi nomor tanah anda" name="kodeTanah">
              <input type="hidden" name="id" value="<?php echo $data2["id"] ?>">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Luas Tanah</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="isi luas tanah anda" name="luasTanah">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Lokasi</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="isi lokasi tanah anda" name="lokasi">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Harga</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="isi harga tanah anda" name="harga">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Sertifikat</label>
            </div>
            <div class="small-8 columns">
              <select name="sertifikat">
                <option value="Ada">Ada</option>
                <option value="Tidak Ada">Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Pajak Bumi Bangunan</label>
            </div>
            <div class="small-8 columns">
              <select name="pbb">
                <option value="Ada">Ada</option>
                <option value="Tidak Ada">Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Izin Mendirikan Bangunan</label>
            </div>
            <div class="small-8 columns">
              <select name="imb">
                <option value="Ada">Ada</option>
                <option value="Tidak Ada">Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Hak Tanggungan</label>
            </div>
            <div class="small-8 columns">
              <select name="hakTanggungan">
                <option value="Ada">Ada</option>
                <option value="Tidak Ada">Tidak Ada</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Tipe </label>
            </div>
            <div class="small-8 columns">
              <select id="right-label" name="tipe">
                <option value="Tanah Kavling">Tanah Kavling</option>
                <option value="Tanah Kosong">Tanah Kosong</option>
                <option value="Tanah + Bangunan">Tanah + Bangunan</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Deskripsi</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Isi deskripsi tanah anda" name="deskripsi">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Gambar</label>
            </div>
            <div class="small-8 columns">
              <input type="file" name="gambar" >
            </div>
          </div>
          <input type="hidden" name="Status" value="0" style="visibility: hidden;" >
          <input type="hidden" name="user_id" value="1" style="visibility: hidden;" >
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>

<!-- Pager -->
  
    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/Elektronik-Tanah-892540144247065/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/elektronik.tanah/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; E-tan| 2017</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
