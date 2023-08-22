<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				
					if(password_verify($password, $row['password'])){
						if($row['type'] == '1'){
							$_SESSION['admin'] = $row['id'];
							header('location: admin/home.php');
						}
						if ($row['type'] == '0') {
						$_SESSION['user'] = $row['id'];
							header('location: index.php');
							
						}
						if($row['type'] == '2'){
							$_SESSION['staff'] = $row['id'];
							header('location: ../staff/home.php');
						}
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	header('location: login.php');

?>