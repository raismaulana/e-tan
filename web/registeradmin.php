<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
/* Main page with two forms: sign up and log in */
session_start();
require_once 'class.user.php';

$reg_user = new USER();

// if($reg_user->is_logged_in()!="")
// {
// 	$reg_user->redirect('home.php');
// }

if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	$nama = trim($_POST['txtnama']);
	$alamat = trim($_POST['txtalamat']);
	$notelp = trim($_POST['txtnotelp']);
	$tempatlahir = $_POST['txttempatlahir'];
	$tanggallahir = trim($_POST['txttanggallahir']);
	$fkktp = trim($_POST['txtfkktp']);
	$gender = trim($_POST['txtgender']);
	$kk = trim($_POST['txtkk']);
	$npwp = trim($_POST['txtnpwp']);
	$suratnikah = trim($_POST['txtsuratNikah']);
	$level = 1;
	$insert_tl = date("Y-m-d", strtotime($tanggallahir));

	$stmt = $reg_user->runQuery("SELECT * FROM user WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-danger'>
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
<head>
<title>Admin E-Tan</title>
<link rel="shortcut icon" href="../images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>

</script>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
<?php if(isset($msg)) echo $msg;  ?>
	<h2>Register Now</h2>
		<form class="form-signin.php" method="post" autocomplete="on">
			<input type="text"required class="ggg" name="txtuname" placeholder="USERNAME">
			<input type="email"required class="ggg" name="txtemail" placeholder="E-MAIL">
			<input type="password"required class="ggg" name="txtpass" placeholder="PASSWORD">
			<input type="text"required class="ggg" name="txtnama" placeholder="NAME">
			<input type="text"required class="ggg" name="txtalamat" placeholder="ALAMAT">
			<input type="text"required class="ggg" name="txtnotelp" placeholder="PHONE">
			<input type="text"required class="ggg" name="txttempatlahir" placeholder="Tempat Lahir">
			<input type="date"required class="ggg" name="txttanggallahir" placeholder="Tanggal Lahir">
			<input type="text"required class="ggg" name="txtfkktp" placeholder="KTP">
			<select name="txtgender" required class="input-sm">
				<option disabled selected> Jenis Kelamin </option>
				<option value="Laki-laki"> Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select><br><br>
			<select name="txtkk" required class="input-sm">
				<option disabled selected> Kartu Keluarga </option>
				<option value="Ada"> Ada</option>
				<option value="Tidak ada">Tidak Ada</option>
			</select>
			<input type="text"required class="ggg" name="txtnpwp" placeholder="NPWP">
			<select name="txtsuratNikah" required class="input-sm">
				<option disabled selected> Surat Nikah </option>
				<option value="Ada"> Ada</option>
				<option value="Tidak ada">Tidak Ada</option>
			</select>

			
				<div class="clearfix"></div><br>
				<center><button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button></button></center>
		</form><br>
		<p>Already Registered ?.<a href="basic_table3.php">Back</a></p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
