<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$layer = $_POST['layer'];
		$price = $_POST['price'];

		try{
			$stmt = $conn->prepare("UPDATE customize_ps_layer SET layer=:layer, price=:price WHERE id=:id");
			$stmt->execute(['layer'=>$layer, 'price'=>$price, 'id'=>$id]);
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

	header('location: customization.php');

?>