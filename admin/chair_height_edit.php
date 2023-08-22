<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$height = $_POST['height'];
		$price = $_POST['price'];

		try{
			$stmt = $conn->prepare("UPDATE customize_chair_height SET height=:height, price=:price WHERE id=:id");
			$stmt->execute(['height'=>$height, 'price'=>$price, 'id'=>$id]);
			$_SESSION['success'] = 'Height and Price updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Height and Price form first';
	}

	header('location: height.php');

?>