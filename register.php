 <?php
 	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		
		$contact = $_POST['contact'];
		
		
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email already taken';
		}
		else{
			$now = date('Y-m-d');
			$password = password_hash($password, PASSWORD_DEFAULT);

			$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code=substr(str_shuffle($set), 0, 12);

			// $filename = $_FILES['email']['name'];
			
			// if(!empty($filename)){
			// 	move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
			
			try{
				$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, address, contact_info, gender, date_of_birth, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :address, :contact, :gender, :dob, :activate_code, :created_on)");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'contact'=>$contact, 'gender'=>$gender, 'dob'=>$dob, 'activate_code'=>$code,  'created_on'=>$now]);
				$_SESSION['success'] = 'You have successfully registered';
				$userid = $conn->lastInsertId();

				$message = "
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>Password: ".$_POST['password']."</p>
						<p>Please click the link below to activate your account.</p>
						<a href='http://localhost/palletcraft/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					";

					//Load phpmailer
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);

		    			try {
				        //Server settings
		    			$mail->SMTPDebug = 2;
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'palletcraft27@gmail.com';     
				        $mail->Password = 'whdjebwsjzyqyegg';                    
				                              
				        $mail->SMTPSecure = 'tls';                           
				        $mail->Port = 587;                                   

				        $mail->setFrom('palletcraft27@gmail.com', 'palletcraft', 0);
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('palletcraft27@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'PalletCraft Site Sign Up';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Account created. Check your email to activate.';
				        header('location: signup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();
			}
		}

		
	
	else{
		$_SESSION['error'] = 'Fill up user form first';
		header('location: signup.php');
	}

	

?>