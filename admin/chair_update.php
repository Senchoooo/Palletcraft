<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$status = $_POST['status'];
		date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d h:i:sa');
		$date1 = date('Y-m-d h:i:sa');

		
		try{
		$stmt = $conn->prepare("SELECT * FROM customize_chair_order WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		
			$stmt = $conn->prepare("UPDATE customize_chair_order SET order_received2=:order_received2, status=:status WHERE id=:id");
			$stmt->execute(['order_received2'=>$date,'status'=>$status, 'id'=>$id]);
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

	header('location: custom_chair_sale2.php');

?>