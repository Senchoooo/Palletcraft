<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$type = $_POST['type'];

		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		if($password == $row['password']){
			$password = $row['password'];
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		try{
			$stmt = $conn->prepare("UPDATE users SET type=:type WHERE id=:id");
			$stmt->execute(['type'=>$type, 'id'=>$id]);
			$_SESSION['success'] = 'User updated successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit user form first';
	}

	header('location: staff.php');

?>