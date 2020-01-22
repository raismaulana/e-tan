<?php

require_once 'dbconfig.php';

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($uname,$email,$upass,$code,$nama,$alamat,$notelp,$tempatlahir,$inserttl,$fkktp,$gender,$kk,$npwp,$suratnikah,$level)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO user(userName,userEmail,userPass,tokenCode,nama,alamat,noTelp,tempatLahir,tanggalLahir,fotoKopiKTP,jenisKelamin,kk,NPWP,suratNikah,level) 
			                                             VALUES(:user_name, :user_mail, :user_pass, :active_code, :nama_user, :alamat_user, :nomor_telepon, :tempat_lahir, :tanggal_lahir, :fotokopi_ktp, :jenis_kelamin, :kartu_keluarga, :npwpajak, :surat_nikah, :level_user)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->bindparam(":nama_user",$nama);
			$stmt->bindparam(":alamat_user",$alamat);
			$stmt->bindparam(":nomor_telepon",$noTelp);
			$stmt->bindparam(":tempat_lahir",$tempatlahir);
			$stmt->bindparam(":tanggal_lahir",$inserttl);
			$stmt->bindparam(":fotokopi_ktp",$fkktp);
			$stmt->bindparam(":jenis_kelamin",$gender);
			$stmt->bindparam(":kartu_keluarga",$kk);
			$stmt->bindparam(":npwpajak",$npwp);
			$stmt->bindparam(":surat_nikah",$suratnikah);
			$stmt->bindparam(":level_user",$level);
			$stmt->execute();	
			return $stmt;
			echo $this;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM user WHERE userEmail=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']=="Y")
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['id'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = 'smtp.gmail.com';      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username='elektronik1tanah@gmail.com';  
		$mail->Password='cahya123';            
		$mail->SetFrom('elektronik1tanah@gmail.com','e-tan Inc.');
		$mail->AddReplyTo("jangandibalas@gmail.com","e-tan Inc.");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}	
}