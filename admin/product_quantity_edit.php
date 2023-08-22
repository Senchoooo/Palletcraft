<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products SET p_quantity=p_quantity+:p_quantity WHERE id=:id");
			$stmt->execute(['p_quantity'=>$quantity, 'id'=>$id]);
			$_SESSION['success'] = 'Product Quantity updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products_inventory.php');

?>