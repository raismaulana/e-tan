<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('logout.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	$nama = trim($_POST['txtnama']);
	$alamat = trim($_POST['txtalamat']);
	$notelp = trim($_POST['txtnotelp']);
	$tempatlahir = trim($_POST['txttempatlahir']);
	$tanggallahir = trim($_POST['txttanggallahir']);
	$fkktp = trim($_POST['txtfkktp']);
	$gender = trim($_POST['txtgender']);
	$kk = trim($_POST['txtkk']);
	$npwp = trim($_POST['txtnpwp']);
	$suratnikah = trim($_POST['txtsuratNikah']);
	$level = 2;
	$insert_tl = date("Y-m-d", strtotime($tanggallahir));

	$stmt = $reg_user->runQuery("SELECT * FROM user WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code,$nama,$alamat,$notelp,$tempatlahir,$tanggallahir,$fkktp,$gender,$kk,$npwp,$suratnikah,$level))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to e-tan Inc.!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://e-tan.khaff.com/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>(E-tan) Elektronik Tanah</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
				<?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        <input type="text" class="input-block-level" placeholder="Username" name="txtuname" required />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
        <input type="text" class="input-block-level" placeholder="Nama Lengkap" name="txtnama" required />
        <input type="text" class="input-block-level" placeholder="Alamat" name="txtalamat" required />
        <input type="text" class="input-block-level" placeholder="Nomor HP" name="txtnotelp" required />
        <input type="text" class="input-block-level" placeholder="Tempat Lahir" name="txttempatlahir" required />
        <input type="date" class="input-block-level" placeholder="Tanggal Lahir" name="txttanggallahir" required />
        <input type="text" class="input-block-level" placeholder="Nomor KTP" name="txtfkktp" required />
        <select name="txtgender" required class="input-sm">
				<option disabled selected> Jenis Kelamin </option>
				<option value="Laki-laki"> Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select><br>
        <select name="txtkk" required class="input-sm">
				<option disabled selected> Kartu Keluarga </option>
				<option value="Ada"> Ada</option>
				<option value="Tidak ada">Tidak Ada</option>
			</select>
        <input type="text" class="input-block-level" placeholder="NPWP" name="txtnpwp" required />
        <select name="txtsuratNikah" required class="input-sm">
				<option disabled selected> Surat Nikah </option>
				<option value="Ada"> Ada</option>
				<option value="Tidak ada">Tidak Ada</option>
			</select>
     	<hr />
     	<p>By clicking Sign Up, you agree to our <a href="html/kebijakanprivasi.html"> Privacy Police</a> and that you have read our <a href="html/company.html">Terms and Conditions.</a></p>
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button>
        <a href="index.php" style="float:right;" class="btn btn-large">Sign In</a>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>