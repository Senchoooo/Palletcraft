<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['reset'])){
		$email = $_POST['email'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			//generate code
			$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code=substr(str_shuffle($set), 0, 15);
			try{
				$stmt = $conn->prepare("UPDATE users SET reset_code=:code WHERE id=:id");
				$stmt->execute(['code'=>$code, 'id'=>$row['id']]);
				
				$message = "
					<h2>Password Reset</h2>
					<p>Your Account:</p>
					<p>Email: ".$email."</p>
					<p>Please click the link below to reset your password.</p>
					<a href='http://localhost/palletcraft/password_reset.php?code=".$code."&user=".$row['id']."'>Reset Password</a>
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
			        $mail->Subject = 'PalletCraft Site Password Reset';
			        $mail->Body    = $message;

			        $mail->send();

			        $_SESSION['success'] = 'Password reset link sent';
			     
			    } 
			    catch (Exception $e) {
			        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			    }
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}
		else{
			$_SESSION['error'] = 'Email not found';
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Input email associated with account';
	}

	header('location: password_forgot.php');

?>