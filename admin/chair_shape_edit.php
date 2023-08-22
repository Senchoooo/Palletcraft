<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$shape = $_POST['shape'];
		$price = $_POST['price'];

		try{
			$stmt = $conn->prepare("UPDATE customize_chair_shape SET shape=:shape, price=:price WHERE id=:id");
			$stmt->execute(['shape'=>$shape, 'price'=>$price, 'id'=>$id]);
			$_SESSION['success'] = 'Shape and Price updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Shape and Price form first';
	}

	header('location: shape.php');

?>