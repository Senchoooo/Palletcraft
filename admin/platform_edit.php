<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];

		try{
			$stmt = $conn->prepare("UPDATE customize_flatform_quantity SET flatform_quantity=:flatform_quantity, price=:price WHERE id=:id");
			$stmt->execute(['flatform_quantity'=>$quantity, 'price'=>$price, 'id'=>$id]);
			$_SESSION['success'] = 'Layer and Price updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Layer and Price form first';
	}

	header('location: platform.php');

?>