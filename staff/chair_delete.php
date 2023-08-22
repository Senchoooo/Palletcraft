<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM customize_chair_order WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Order deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select Order to delete first';
	}

	header('location: custom_chair_sale.php');
	
?>