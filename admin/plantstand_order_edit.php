<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$status = $_POST['status'];

		try{
			$stmt = $conn->prepare("UPDATE customize_order SET status=:status WHERE id=:id");
			$stmt->execute(['status'=>$status, 'id'=>$id]);
			$_SESSION['success'] = 'Status updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Update Status form first';
	}

	header('location: custom_sale.php');

?>